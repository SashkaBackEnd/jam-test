<?php

declare(strict_types=1);

namespace console\controllers;

use yii\console\{Controller, ExitCode};
use yii\helpers\Console;
use console\models\LinkingGoodWithCategory;

class GoodCategoryController extends Controller
{
    /**
     * @return int
     */
    public function actionMakeLink()
    {
        $this->stdout("START ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        $linkingGoodWithCategory = new LinkingGoodWithCategory();
        $linkingGoodWithCategory->handling();

        if ($linkingGoodWithCategory->hasErrors()) {
            $this->stdout($linkingGoodWithCategory->getFirstError(key($linkingGoodWithCategory->getFirstErrors())));
        } else {
            $this->stdout("Successfully processed: {$linkingGoodWithCategory->handlingSuccess}.\n");
            $this->stdout("Errors processed: {$linkingGoodWithCategory->handlingErrors}.\n");
        }

        $this->stdout("END ===== " . date('Y-m-d H:i:s') . "\n", Console::FG_BLUE);

        return ExitCode::OK;
    }
}
