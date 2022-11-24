<?php

declare(strict_types=1);

namespace console\models;

use common\models\base\GoodCategory;
use console\helpers\GoodHelper;

class LinkingGoodWithCategory extends LoadCategory
{
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

                $this->makeLink($data);
                $iterator++;
            }
            fclose($handle);
            $this->handlingRows = $iterator;

            return true;
        }

        return false;
    }

    /**
     * @param array $data
     */
    private function makeLink(array $data)
    {
        $categories = $this->categoryRecord($data);
        $goodId = GoodHelper::determineGoodId($data);

        foreach ($categories as $category) {
            if (isset($category['id'])) {
                // TODO: через ActiveQuery
                // FIXME: вынести все ...->exists() в переменную isGoodCategory и ее передавать в if()
                if (!GoodCategory::find()->where(['category_id' => $category['id'], 'good_id' => $goodId])->exists()) {
                    $goodCategory = new GoodCategory();
                    $goodCategory->good_id = $goodId;
                    $goodCategory->category_id = $category['id'];

                    if ($goodCategory->save()) {
                        $this->handlingSuccess++;
                    } else {
                        $this->handlingErrors++;
                    }
                }
            } else {
                $this->handlingErrors++;
            }
        }
    }
}
