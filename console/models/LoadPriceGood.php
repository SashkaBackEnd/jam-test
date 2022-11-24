<?php

namespace console\models;

use backend\modules\manager\models\PositionMatching\GoodsOfMatchingService;
use backend\modules\manager\models\PositionMatching\LoadGoodForm;
use console\controllers\GoodsController;
use yii\console\Controller;
use yii\helpers\BaseConsole;

class LoadPriceGood
{
    /**
     * Консольный контроллер
     *
     * @var GoodsController Controller
     */
    private $consoleController;

    public function __construct($consoleController)
    {
        $this->consoleController = $consoleController;
    }

    public function handle()
    {
        $this->consoleController->stdout("START ===== " . date('Y-m-d H:i:s') . "\n", BaseConsole::FG_BLUE);

        if ($this->isCorrectFile()) {
            $loadGoodForm = new LoadGoodForm();
            $loadGoodForm->loadedFileName = $this->consoleController->fileName;
            $loadGoodForm->scenario = LoadGoodForm::SCENARIO_CONSOLE;
            $loadGoodForm->processing();

            $this->consoleController->stdout(
                "Statistic: {$loadGoodForm->getStatistic(true)} \n",
                BaseConsole::FG_GREEN
            );
        } else {
            $this->consoleController->stderr("File is not correct" . "\n", BaseConsole::FG_RED);
        }


        $this->consoleController->stdout("END ===== " . date('Y-m-d H:i:s') . "\n", BaseConsole::FG_BLUE);
    }

    private function isCorrectFile()
    {
        $fileName = $this->consoleController->fileName;
        $filePath = GoodsOfMatchingService::getFilePathStorage() . '/' . $fileName;

        if (file_exists($filePath)) {
            $correctExtensions = ['xls', 'xlsx'];
            $extension = substr($fileName, strrpos($fileName, '.') + 1);

            return in_array($extension, $correctExtensions);
        }

        return false;
    }
}
