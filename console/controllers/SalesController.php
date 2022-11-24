<?php

namespace console\controllers;

use console\models\LoadDataToSales;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class SalesController extends Controller
{
    /**
     * Обогащение базы данными по продажам
     *
     * @command php yii sales/add-data
     *
     * @return int
     */
    public function actionAddData()
    {
        $this->stdout("START ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        $loadDataToSales = new LoadDataToSales($this);
        $loadDataToSales->handling();

        $this->stdout("END ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        return ExitCode::OK;
    }
}
