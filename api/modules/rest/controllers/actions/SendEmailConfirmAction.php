<?php

namespace api\modules\rest\controllers\actions;

use Yii;
use yii\base\Action;
use api\traits\{TraitResponseFormatter, TraitAuthenticate};

/**
 * Повторно отправить подтверждения email
 */
class SendEmailConfirmAction extends Action
{
    use TraitResponseFormatter;
    use TraitAuthenticate;

    public function run()
    {
        $user = $this->getAuthenticationUser($this->getBearerToken());

        try {
            $user->generateEmailVerificationToken();

            if ($user->save()) {
                $user->sendEmailConfirmAccount();

                return $this->renderSuccess(Yii::t('api', 'Письмо успешно отправлено'), 200);
            }

            return $this->renderError(Yii::t('api', 'Не удалось отправить письмо'), 500, $user->getErrors());
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
