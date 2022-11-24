<?php

declare(strict_types=1);

namespace api\modules\rest\controllers\actions;

use api\models\User;
use api\services\UserAgentService;
use common\models\base\UserLog;
use api\traits\{TraitJsonWebToken, TraitResponseFormatter};
use common\forms\LoginForm;
use Yii;
use yii\base\Action;
use yii\base\Exception;
use yii\base\InvalidConfigException;

/**
 * Авторизация
 */
class LoginAction extends Action
{
    use TraitJsonWebToken;
    use TraitResponseFormatter;

    /**
     * @throws Exception
     * @throws InvalidConfigException
     */
    public function run(): array
    {
        $model = new LoginForm(Yii::$app->request->getBodyParams());

        if ($model->login()) {

            $token = $this->generateJwt();
            $authToken = $this->generateAuthToken();

            return $this->renderSuccess(
                Yii::t('api', 'Вы успешно авторизовались'),
                200,
                [
                    'access_token' => $token,
                    'refresh_token' => $authToken->getRefreshToken(),
                    'expires_access_token' => time() + Yii::$app->params['jwt']['expire']
                ]
            );
        } else {
            return $this->renderError(Yii::t('api', 'Не удалось авторизоваться'), 422, $model->getErrors());
        }
    }
}
