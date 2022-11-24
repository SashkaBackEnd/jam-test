<?php

namespace api\modules\rest\controllers\actions;

use Yii;
use yii\base\Action;
use api\traits\TraitAuthenticate;
use api\traits\TraitResponseFormatter;

/**
 * Отдать данные, которые содержать в письме
 */
class EmailDataAction extends Action
{
    use TraitResponseFormatter;
    use TraitAuthenticate;

    public function run()
    {
        $user = $this->getAuthenticationUser($this->getBearerToken());

        try {
            $data = [
                'verification_token' => $user->verification_token,
                'password_reset_token' => $user->password_reset_token,
            ];
            return $this->renderSuccess('Получите и распишитесь :)', 200, $data);
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
