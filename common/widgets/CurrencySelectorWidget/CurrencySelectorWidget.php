<?php

namespace common\widgets\CurrencySelectorWidget;

use common\models\base\Currency;
use yii\base\Widget;

/**
 * Виджет для выбора валюты
 */
class CurrencySelectorWidget extends Widget
{
    private $currencies;
    private $countCurrencies;

    public function init()
    {
        $this->currencies = Currency::find()->all();
        $this->countCurrencies = count($this->currencies);
    }

    public function run()
    {
        return $this->render('currency-selector-widget', [
            'currencies' => $this->currencies,
            'countCurrencies' => $this->countCurrencies,
        ]);
    }
}
