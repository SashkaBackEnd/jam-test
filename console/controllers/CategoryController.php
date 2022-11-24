<?php

declare(strict_types=1);

namespace console\controllers;

use yii\console\{Controller, ExitCode};
use yii\helpers\Console;
use console\models\LoadCategory;

class CategoryController extends Controller
{
    /**
     * @return int
     */
    public function actionLoadCategory()
    {
        $this->stdout("START ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        $loadCategory = new LoadCategory();
        $loadCategory->handling();

        if ($loadCategory->hasErrors()) {
            $this->stdout($loadCategory->getFirstError(key($loadCategory->getFirstErrors())));
        } else {
            $this->stdout("All rows processed: {$loadCategory->handlingRows}.\n");
            $this->stdout("Successfully processed: {$loadCategory->handlingSuccess}.\n");
            $this->stdout("Errors processed: {$loadCategory->handlingErrors}.\n");
            $this->stdout("Skip processed: {$loadCategory->handlingSkip}.\n");
        }

        $this->stdout("END ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        return ExitCode::OK;
    }
}
