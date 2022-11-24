<?php

declare(strict_types=1);

namespace api\modules\rest\controllers;

use yii\rest\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return ['OK'];
    }
}
