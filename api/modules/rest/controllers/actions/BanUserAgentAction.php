<?php

declare(strict_types=1);

namespace api\modules\rest\controllers\actions;

use api\modules\rest\forms\BanUserAgentForm;
use api\traits\TraitResponseFormatter;
use Yii;
use yii\base\Action;

class BanUserAgentAction extends Action
{
    use TraitResponseFormatter;

    public function run()
    {
        $model = new BanUserAgentForm(Yii::$app->request->getBodyParams());

        try {
            if (!$model->validate()) {
                return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422, $model->getErrors());
            }

            if ($model->banAgent()) {
                return $this->renderSuccess(Yii::t('api', 'Вы заблокировали устройство'));
            }

            return $this->renderError(
                Yii::t(
                    'api',
                    'Ссылка для блокировки устройства не действительна, запросите новую'
                ),
                400
            );
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
