<?php

declare(strict_types=1);

namespace api\modules\rest\controllers\actions;

use api\models\{AuthTokens, User};
use Throwable;
use api\traits\{TraitJsonWebToken, TraitResponseFormatter};
use Yii;
use yii\base\Action;
use yii\db\StaleObjectException;

/**
 * POST Обновление access токена
 */
class AccessTokenAction extends Action
{
    use TraitJsonWebToken;
    use TraitResponseFormatter;

    public function init()
    {
        parent::init();
    }

    /**
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function run()
    {
        $refreshToken = Yii::$app->request->post("refresh_token");

        if (!$refreshToken) {
            return $this->renderError(Yii::t('api', 'Resfresh token отсутствует в запросе'), 400, []);
        }

        $authToken = AuthTokens::findRefreshToken($refreshToken);

        if (!$authToken) {
            return $this->renderError(Yii::t('api', 'Рефреш токен не найден'), 401, []);
        }

        if (Yii::$app->request->isPost) {
            $user = User::findActiveUserById($authToken->users__id);

            if (!$user) {
                $authToken->delete();

                return $this->renderError(Yii::t('api', 'Пользователь не активный или удален'), 403, []);
            }

            Yii::$app->user->setIdentity($user);
            $token = $this->generateJwt();

            return $this->renderSuccess(
                Yii::t('api', 'JWT успешно обновлен'),
                200,
                [
                    'access_token' => $token,
                    'expires_access_token' => time() + Yii::$app->params['jwt']['expire'],
                ]
            );
        }

        return $this->renderError(Yii::t('api', 'HTTP метод не поддерживается'), 405, []);
    }
}
