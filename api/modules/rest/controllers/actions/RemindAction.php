<?php

namespace api\modules\rest\controllers\actions;

use api\modules\rest\forms\RemindForm;
use api\traits\TraitResponseFormatter;
use Yii;
use yii\base\Action;

/**
 * Восстановление пароля
 */
class RemindAction extends Action
{
    use TraitResponseFormatter;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new RemindForm(Yii::$app->request->getBodyParams());

        try {
            if (!$model->validate()) {
                return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422, $model->getErrors());
            }

            if ($model->remind()) {
                return $this->renderSuccess(Yii::t('api', 'Ссылка на восстановление пароля успешно отправлена'), 200);
            }

            return $this->renderError(
                Yii::t(
                    'api',
                    'Пользователь с таким адресом электронной почты не найден, исправьте адрес электронной почты'
                ),
                422,
                $model->getErrors()
            );
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
