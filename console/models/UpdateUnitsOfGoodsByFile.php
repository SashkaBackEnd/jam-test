<?php

namespace console\models;

use common\components\Language;
use common\models\base\Eas\EasProductTranslation;
use common\models\UnitMeasure;
use Yii;
use yii\helpers\ArrayHelper;

class UpdateUnitsOfGoodsByFile
{
    private $file;
    private $languageId;
    private $russianEasProducts;

    public function __construct()
    {
        $this->file = Yii::getAlias('@console_uploads') . '/good/goods-update-units.csv';
        $this->languageId = Language::DEFAULT_LANGUAGE_ID;
        $this->russianEasProducts = ArrayHelper::map(
            EasProductTranslation::find()->where(['eas_lang_id' => Language::RUSSIAN_LANGUAGE_ID])->all(),
            'eas_product_id',
            'name_base'
        );
    }

    public function handling(): bool
    {
        if (($handle = fopen($this->file, "r")) !== false) {
            $iterator = 0;

            while (($data = fgetcsv($handle)) !== false) {
                if ($iterator == 0) {
                    $iterator++;

                    continue;
                }

                $this->updateGoodUnit($data);
                $iterator++;
            }

            fclose($handle);

            return true;
        }

        return false;
    }

    private function updateGoodUnit($data)
    {
        $easProductId = $data[0] ?? null;
        if (!empty($easProductId)) {
            $model = $this->getModelEasProductTranslation($data[0]);
            $model->ddd = $data[3] ?? null;
            $model->ddd_unit_measure_id = $this->findUnitOfMeasurement($data[4] ?? null);
            $model->weight_volume = $data[5] ?? null;
            $model->weight_volume_unit_measure_id = $this->findUnitOfMeasurement($data[6] ?? null);
            if (!$model->save()) {
                Yii::error([
                    'msg' => 'Не удалось сохранить обновление перевода товара',
                    'error' => $model->getErrors(),
                    'data' => $model->attributes
                ], __CLASS__);
            }
        }
    }

    /**
     * @param $unitName
     * @return int|string|null
     */
    private function findUnitOfMeasurement($unitName): int|string|null
    {
        if (!empty($unitName)) {
            $unitId = UnitMeasure::find()->select(['id'])
                ->where(['like', 'lower(name)', mb_strtolower($unitName)])->scalar();

            if ($unitId !== false) {
                return $unitId;
            } else {
                $unitMeasure = new UnitMeasure();
                $unitMeasure->name = $unitName;
                if ($unitMeasure->save()) {
                    return $unitMeasure->id;
                }
            }
        }

        return null;
    }

    /**
     * @param mixed $data
     *
     * @return EasProductTranslation
     */
    private function getModelEasProductTranslation(mixed $data)
    {
        $model = EasProductTranslation::find()->where(
            ['eas_product_id' => $data, 'eas_lang_id' => $this->languageId]
        )->one();
        if (empty($model)) {
            $model = new EasProductTranslation();
            $model->eas_lang_id = $this->languageId;
            $model->eas_product_id = $data;
            $model->name_base = $this->russianEasProducts[$data] ?? null;
        }
        return $model;
    }
}
