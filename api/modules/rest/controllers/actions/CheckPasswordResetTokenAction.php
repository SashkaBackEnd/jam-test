<?php

namespace api\modules\rest\controllers\actions;

use api\modules\rest\forms\CheckPasswordResetTokenForm;
use api\traits\TraitResponseFormatter;
use Yii;
use yii\base\Action;

/**
 * Проверка токена сброса пароля на валидность
 */
class CheckPasswordResetTokenAction extends Action
{
    use TraitResponseFormatter;

    public function run()
    {
        $model = new CheckPasswordResetTokenForm(Yii::$app->request->getBodyParams());

        try {
            if (!$model->validate()) {
                return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422, $model->getErrors());
            }

            if (!$model->validatePasswordResetToken()) {
                return $this->renderError(
                    Yii::t(
                        'api',
                        'Ссылка для восстановления пароля недействительна, запросите новую'
                    ),
                    422,
                    $model->getErrors()
                );
            }

            return $this->renderSuccess(Yii::t('api', 'Токен сброса пароля валиден'), 200);
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
