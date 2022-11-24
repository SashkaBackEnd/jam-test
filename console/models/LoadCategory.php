<?php

// TODO: добавить строгую типизацию

namespace console\models;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use common\models\base\CategoryTranslate;
use common\models\Category;
use common\models\Eas\EasLang;

class LoadCategory extends Model
{
    public const DEFAULT_LANG_ID = 2;

    protected string $file;
    protected string $path;

    public int $handlingErrors = 0;
    public int $handlingSuccess = 0;
    public int $handlingSkip = 0;
    public int $handlingRows = 0;

    public function beforeValidate()
    {
        $this->path = Yii::getAlias('@console_uploads') . '/category';
        $this->findFile();

        return parent::beforeValidate();
    }

    private function findFile()
    {
        $files = FileHelper::findFiles($this->path, ['only' => ['category-*.csv']]);

        if (count((array)$files) > 0) {
            $this->file = end($files);

            return;
        }

        $this->addError('file', "File not found.\n");
    }

    /**
     * @return bool
     */
    public function handling(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        if (($handle = fopen($this->file, "r")) !== false) {
            $iterator = 0;

            while (($data = fgetcsv($handle)) !== false) {
                if ($iterator == 0) {
                    $iterator++;

                    continue;
                }

                $this->categoryRecord($data);
                $iterator++;
            }

            fclose($handle);
            $this->handlingRows = $iterator;

            return true;
        }

        return false;
    }

    protected function categoryRecord(array $data)
    {
        $categories = [
            1 => ['nameRu' => $data[16] ?? null, 'nameEn' => $data[12] ?? null],
            2 => ['nameRu' => $data[17] ?? null, 'nameEn' => $data[13] ?? null],
            3 => ['nameRu' => $data[18] ?? null, 'nameEn' => $data[14] ?? null],
        ];

        foreach ($categories as $level => &$category) {
            // TODO: сделать через ActiveQuery
            $categoryIdFromDb = CategoryTranslate::find()
                ->joinWith('category')
                ->select(['category_translate.category_id'])
                ->where([
                    'or',
                    ['=', 'name', $category['nameRu']],
                    ['=', 'name', $category['nameEn']]
                ])
                ->andWhere(['level' => $level])->scalar();

            if ($categoryIdFromDb === false) {
                if ($level == 1) {
                    $parentId = null;
                }
                $categoryModel = new Category();
                $categoryModel->level = $level;
                $categoryModel->parent_id = $parentId ?? null;

                if ($categoryModel->save()) {
                    $this->saveTranslation($category, $categoryModel->id);
                    $parentId = $categoryModel->id;

                    $category['id'] = $parentId;
                    $this->handlingSuccess++;
                } else {
                    $this->handlingErrors++;
                }

                continue;
            } else {
                $category['id'] = $categoryIdFromDb;
            }

            // чтобы не запускалось на каждом уровне
            if ($level == 1) {
                $this->handlingSkip++;
            }
        }

        return $categories;
    }

    private function saveTranslation(array $categoryNames, $categoryId): void
    {
        foreach ($categoryNames as $name => $value) {
            if (!empty($value)) {
                $categoryTranslate = new CategoryTranslate();
                $categoryTranslate->category_id = $categoryId;
                $categoryTranslate->name = $value;
                $categoryTranslate->eas_lang_id = $this->determineLangId($name);
                $categoryTranslate->save();
            }
        }
    }

    /**
     * Определяем язык на основе имени категории
     * @param string $name
     * @return int
     */
    private function determineLangId(string $name): int
    {
        $name = str_replace('name', '', $name);

        foreach (EasLang::getLanguageList() as $lang) {
            if (stripos($lang->code, $name) !== false) {
                return $lang->id;
            }
        }

        return self::DEFAULT_LANG_ID;
    }
}
