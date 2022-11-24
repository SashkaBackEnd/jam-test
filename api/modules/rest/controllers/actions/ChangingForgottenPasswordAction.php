<?php

namespace api\modules\rest\controllers\actions;

use api\exceptions\BadRequestException;
use api\models\AuthTokens;
use api\modules\rest\forms\ChangingForgottenPasswordForm;
use api\traits\{TraitAuthenticate, TraitJsonWebToken, TraitResponseFormatter};
use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;

/**
 * Изменение забытого пароля
 */
class ChangingForgottenPasswordAction extends Action
{
    use TraitResponseFormatter;
    use TraitJsonWebToken;
    use TraitAuthenticate;

    /**
     * @return array
     * @throws BadRequestException
     * @throws InvalidConfigException
     */
    public function run(): array
    {
        $this->getAuthenticationUser($this->getBearerToken());

        $model = new ChangingForgottenPasswordForm(Yii::$app->request->getBodyParams());

        try {
            if (!$model->validate()) {
                return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422, $model->getErrors());
            }

            if (!$model->validatePasswordResetToken()) {
                return $this->renderError(
                    Yii::t('api', 'Токен сброса пароля не действителен'),
                    422
                );
            }

            $user = $model->getUser();

            if ($model->changePassword($user)) {
                AuthTokens::deleteAll(['users__id' => Yii::$app->user->getId()]);

                return $this->renderSuccess(Yii::t('api', 'Пароль успешно изменен'));
            }

            return $this->renderError(Yii::t('api', 'Не удалось изменить пароль'), 500, $model->getErrors());
        } catch (\Throwable $th) {
            return $this->renderError(Yii::t('api', 'Ошибка на сервере'), 500, [$th->getMessage()]);
        }
    }
}
