<?php

// TODO: добавить строгую типизацию

namespace console\models;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use backend\modules\manager\models\GoodCountry\GoodCountry;
use common\models\Country;
use console\helpers\GoodHelper;

class LoadConsumptionCapacity extends Model
{
    private string $file;
    private string $path;

    public int $handlingErrors = 0;
    public int $handlingSuccess = 0;

    public function beforeValidate()
    {
        $this->path = Yii::getAlias('@console_uploads') . '/good-country';
        $this->findFile();

        return parent::beforeValidate();
    }

    private function findFile()
    {
        $files = FileHelper::findFiles($this->path, ['only' => ['consumption-capacity-russia-*.csv']]);

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

                $this->capacitanceRecord($data);
            }
            fclose($handle);

            return true;
        }

        return false;
    }

    private function capacitanceRecord(array $data): void
    {
        $countryId = 1;
        $goodId = GoodHelper::determineGoodId($data);

        if (empty($goodId)) {
            return;
        }

        if (!$goodCountry = GoodCountry::findOne(['good_id' => $goodId, 'country_id' => $countryId])) {
            $goodCountry = new GoodCountry();
            $goodCountry->country_id = $countryId;
            $goodCountry->good_id = $goodId;
        }

        $consumptionCapacities = $this->prepareConsumptionCapacities($data);
        $countryModel = Country::findOne($countryId);
        $goodCountry->consumption_capacities = (int)$consumptionCapacities;
        $goodCountry->coefficient_consumption_capacities =
            GoodCountry::calcCoefficientConsumptionCapacities($consumptionCapacities, $countryModel->population);
        $goodCountry->calculation_formula = 1;
        $goodCountry->save();

        if ($goodCountry->hasErrors()) {
            $this->handlingErrors++;
        } else {
            $this->handlingSuccess++;
        }
    }

    /**
     * @param array $data
     * @return float|null
     */
    private function prepareConsumptionCapacities(array $data)
    {
        $consumptionCapacities = $data[4] ?? null;

        if (empty($consumptionCapacities)) {
            return null;
        }

        $consumptionCapacities = str_replace(",", '.', $consumptionCapacities);
        $consumptionCapacities = preg_replace("/[^x\d|*\.]/", "", $consumptionCapacities);

        return round($consumptionCapacities, 0, PHP_ROUND_HALF_UP);
    }
}
