<?php

declare(strict_types=1);

namespace api\modules\rest\controllers\actions;

use api\models\AuthTokens;
use api\traits\{TraitJsonWebToken, TraitResponseFormatter};
use Yii;
use yii\base\Action;
use yii\base\Exception;
use yii\base\InvalidConfigException;

/**
 * Авторизация
 */
class LogoutAction extends Action
{
    use TraitJsonWebToken;
    use TraitResponseFormatter;

    /**
     * @throws Exception
     * @throws InvalidConfigException
     * @throws \Throwable
     */
    public function run(): array
    {
        $refreshToken = Yii::$app->request->post("refresh_token");

        if (!$refreshToken) {
            return $this->renderError(Yii::t('api', 'Resfresh token отсутствует в запросе'), 400, []);
        }

        if ($authToken = AuthTokens::findRefreshToken($refreshToken)) {
            $authToken->delete();
            Yii::$app->user->logout();

            return $this->renderSuccess(Yii::t('api', 'Вы успешно вышли из системы'),200, []);
        } else {
            return $this->renderError(Yii::t('api', 'Не удалось найти запись авторизации'), 422, []);
        }
    }
}
