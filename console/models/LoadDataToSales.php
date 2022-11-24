<?php

namespace console\models;

use backend\helpers\CommonHelper;
use common\models\base\SaleGood;
use common\models\Currency;
use common\models\Good;
use console\controllers\SalesController;
use Yii;
use yii\helpers\BaseConsole;

class LoadDataToSales
{
    private const DOLLAR_EXCHANGE_RATE = 65;

    /**
     * Консольный контроллер
     *
     * @var SalesController Controller
     */
    private $file;
    private $consoleController;

    public function __construct($consoleController)
    {
        $this->consoleController = $consoleController;
        $this->file = Yii::getAlias('@console_uploads') . '/sales/sales.csv';
    }

    public function handling(): bool
    {
        if ($this->isCorrectFile()) {
            if (($handle = fopen($this->file, "r")) !== false) {
                $iterator = 0;

                while (($data = fgetcsv($handle)) !== false) {
                    if ($iterator == 0) {
                        $iterator++;

                        continue;
                    }

                    $this->addSalesData($data);
                    $iterator++;
                }
                fclose($handle);

                return true;
            } else {
                $this->consoleController->stderr("File is not readable" . "\n", BaseConsole::FG_RED);
            }
        } else {
            $this->consoleController->stderr("File is not correct" . "\n", BaseConsole::FG_RED);
        }

        return false;
    }

    private function isCorrectFile(): bool
    {
        if (file_exists($this->file)) {
            return true;
        }

        return false;
    }

    private function addSalesData($data)
    {
        $iqviaId = $data[0] ?? null;
        if (empty($iqviaId)) {
            return;
        }

        $good = Good::find()->joinWith('easProduct')->where(['eas_product.iqvia_id' => $iqviaId])->one();
        $currency = Currency::findOne(['code' => 'USD']);
        $startPeriod = '2018-08-01';
        $endPeriod = '2020-08-01';

        if (empty($good)) {
            return;
        }

        $saleGoodExists = SaleGood::find()->where([
            'good_id' => $good->id,
            'currency_id' => $currency->id ?? null,
            'start_period' => $startPeriod,
            'end_period' => $endPeriod
        ])->exists();

        if (!$saleGoodExists) {
            $saleGood = new SaleGood();
            $saleGood->wholesale_value = $this->translateValue($data[1] ?? 0);
            $saleGood->retail_value = $this->translateValue($data[2] ?? 0);
            $saleGood->margin_value = $this->translateValue($data[3] ?? 0);
            $saleGood->sales_value = $this->translateValue($data[4] ?? 0, false) / 100;
            $saleGood->good_id = $good->id;
            $saleGood->currency_id = $currency->id ?? null;
            $saleGood->start_period = '2018-08-01';
            $saleGood->end_period = '2020-08-01';
            if (!$saleGood->save()) {
                Yii::error([
                    'msg' => 'Не удалось сохранить данные о продажах',
                    'data' => $saleGood->attributes,
                    'error' => $saleGood->getErrors(),
                    'rawDataFromFile' => $data
                ], __CLASS__);
            }
        }
    }

    /**
     * @param $value
     * @param bool $withExchangeRate
     * @return float|int|mixed|null
     */
    private function translateValue($value, bool $withExchangeRate = true)
    {
        if ($value == 0) {
            return $value;
        }

        $value = CommonHelper::preparePrice($value);

        if ($withExchangeRate) {
            $value = $value / self::DOLLAR_EXCHANGE_RATE;
            $value = round($value);
        }

        return $value;
    }
}
