<?php

namespace api\traits;

use api\exceptions\BadRequestException;
use api\exceptions\ForbiddenHttpException;
use api\exceptions\UnauthorizedHttpException;
use api\models\User;
use Yii;
use yii\web\IdentityInterface;

/**
 * Примесь для прохождения процедуры аутентификации
 */
trait TraitAuthenticate
{
    /**
     * Проверка JWT в заголовке Authorization
     *
     * @return string|null
     */
    public function getBearerToken(): ?string
    {
        $authHeader = Yii::$app->request->getHeaders()->get('Authorization');

        if ($authHeader !== null && preg_match("/^Bearer\\s+(.*?)$/", $authHeader, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Аутентификация пользователя
     *
     * @param string|null $token
     * @return \common\models\User|IdentityInterface|null
     * @throws ForbiddenHttpException
     * @throws UnauthorizedHttpException
     */
    public function getAuthenticationUser(?string $token): \common\models\User|IdentityInterface|null
    {
        if (empty($token) || !$user = User::findIdentityByAccessToken($token, get_class($this))) {
            return null;
        }

        Yii::$app->user->setIdentity($user);

        return $user;
    }

    /**
     * Аутентификация пользователя
     *
     * @param string|null $token
     * @return User|null
     * @throws BadRequestException
     */
    public function deleteAuthenticationUser(?string $token): bool
    {
        if (empty($token)) {
            throw new BadRequestException(Yii::t('api', 'Не передан Bearer токен'));
        }

        $user = User::findIdentityByAccessToken($token, get_class($this));

    }
}
