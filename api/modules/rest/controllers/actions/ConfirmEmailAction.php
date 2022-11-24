<?php

namespace api\modules\rest\controllers\actions;

use api\modules\rest\forms\ConfirmEmailForm;
use api\traits\TraitResponseFormatter;
use Yii;
use yii\base\Action;

/**
 * Подтверждение email
 */
class ConfirmEmailAction extends Action
{
    use TraitResponseFormatter;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new ConfirmEmailForm(Yii::$app->request->getBodyParams());

        try {
            if (!$model->validate()) {
                return $this->renderError(
                    Yii::t('api', 'Ошибка валидации данных'),
                    422,
                    $model->getErrors()
                );
            }

            if (!$model->getUser()) {
                return $this->renderError(
                    Yii::t('api', 'Ссылка для восстановления пароля недействительна, запросите новую'),
                    404
                );
            }

            if ($model->isConfirmedEmail()) {
                return $this->renderSuccess(Yii::t('api', 'Электронная почта уже подтверждена'));
            } else {
                if ($model->updateUser()) {
                    return $this->renderSuccess(Yii::t('api', 'Вы успешно подтвердили электронную почту'));
                } else {
                    return $this->renderError(Yii::t('api', 'Не удалось подтвердить электронную почту'));
                }
            }
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
