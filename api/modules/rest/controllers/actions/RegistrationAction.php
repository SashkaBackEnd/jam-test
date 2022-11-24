<?php

declare(strict_types=1);

namespace api\modules\rest\controllers\actions;

use Yii;
use yii\base\Action;
use api\traits\{TraitJsonWebToken, TraitResponseFormatter};
use api\modules\rest\forms\RegistrationForm;
use yii\base\InvalidConfigException;

/**
 * Регистрация пользователя
 */
class RegistrationAction extends Action
{
    use TraitJsonWebToken;
    use TraitResponseFormatter;

    /**
     * @throws InvalidConfigException
     */
    public function run(): array
    {
        $model = new RegistrationForm(Yii::$app->request->getBodyParams());

            if ($user = $model->registration()) {

                if ($user->hasErrors()) {
                    return $this->renderError(Yii::t('api', 'Не удалось зарегистрироваться'), 422, $user->getErrors());
                }

//                $user->sendEmailConfirmAccount();

                $token = $this->generateJwt();
                $authToken = $this->generateAuthToken();

                return $this->renderSuccess(
                    Yii::t('api', 'Пользователь успешно зарегистрирован'),
                    201,
                    [
                        'access_token' => $token,
                        'refresh_token' => $authToken->getRefreshToken(),
                        'expires_access_token' => time() + Yii::$app->params['jwt']['expire']
                    ]
                );
            } else {
                return $this->renderError(
                    Yii::t('api', 'Ошибка валидации данных'),
                    422,
                    $model->getErrors()
                );
            }
        try {
        } catch (\Throwable $th) {
            return $this->renderError(
                Yii::t('api', 'Ошибка на сервере'),
                500,
                [$th->getMessage()]
            );
        }
    }
}
