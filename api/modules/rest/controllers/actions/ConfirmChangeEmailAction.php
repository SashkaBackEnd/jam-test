<?php

declare(strict_types=1);

namespace api\modules\rest\controllers\actions;

use api\modules\rest\forms\ConfirmEmailForm;
use api\traits\TraitResponseFormatter;
use Yii;
use yii\base\Action;

/**
 * Подтверждение изменения email
 */
class ConfirmChangeEmailAction extends Action
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
                return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422, $model->getErrors());
            }

            if ($model->changedEmailToNew()) {
                return $this->renderSuccess(Yii::t('api', 'Вы успешно подтвердили электронную почту'));
            } else {
                return $this->renderError(
                    Yii::t(
                        'api',
                        'Ссылка для смены почты недействительна, запросите новую'
                    ),
                    400
                );
            }
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
