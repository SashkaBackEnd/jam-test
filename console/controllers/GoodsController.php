<?php

namespace console\controllers;

use console\models\LoadPriceGood;
use console\models\UpdateUnitsOfGoodsByFile;
use yii\console\Controller;

class GoodsController extends Controller
{
    /**
     * @var string $fileName
     */
    public string $fileName = '';

    /**
     * @inheritDoc
     */
    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'fileName',
        ]);
    }

    /**
     * Загрузка товаров по прайс-листам
     *
     * @command php yii goods/load-price --fileName=price_countries.xlsx - Загрузка с указанием файла
     *
     * @return void
     */
    public function actionLoadPrice()
    {
        $loadPriceGood = new LoadPriceGood($this);
        $loadPriceGood->handle();
    }

    /**
     * Обновление товаров
     *
     * @command php yii goods/update-fields-for-goods
     *
     * @return void
     */
    public function actionUpdateFieldsForGoods()
    {
        $updateUnitsOfGoodsByFile = new UpdateUnitsOfGoodsByFile();
        $updateUnitsOfGoodsByFile->handling();
    }
}
