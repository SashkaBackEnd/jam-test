<?php

declare(strict_types=1);

namespace console\controllers;

use yii\console\{Controller, ExitCode};
use yii\helpers\Console;
use console\models\LoadConsumptionCapacity;

class GoodCountryController extends Controller
{
    /**
     * php yii good-country/load-consumption-capacity
     * Обработка файла для загрузки емкости потребления товаров
     */
    public function actionLoadConsumptionCapacity()
    {
        $this->stdout("START ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        $loadConsumptionCapacity = new LoadConsumptionCapacity();
        $loadConsumptionCapacity->handling();

        if ($loadConsumptionCapacity->hasErrors()) {
            $this->stdout($loadConsumptionCapacity->getFirstError(key($loadConsumptionCapacity->getFirstErrors())));
        } else {
            $this->stdout("Successfully processed: {$loadConsumptionCapacity->handlingSuccess}.\n");
            $this->stdout("Errors processed: {$loadConsumptionCapacity->handlingErrors}.\n");
        }

        $this->stdout("END ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        return ExitCode::OK;
    }
}
