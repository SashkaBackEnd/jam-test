<?php

namespace api\traits;

use api\exceptions\RuntimeException;
use api\exceptions\UnauthorizedHttpException;
use api\models\AuthTokens;
use Firebase\JWT\{JWT, Key};
use Yii;
use yii\base\Exception;


// TODO: вынести из Trait в api/components/JsonWebToken.php

/**
 * Примесь для работы с JWT токеном
 */
trait TraitJsonWebToken
{
    /**
     * Генерация JWT-токена с помощью библиотеки PHP JWT от Firebase
     *
     * @see https://github.com/firebase/php-jwt
     *
     * @return string
     */
    public function generateJwt(): string
    {
        $jwtParams = Yii::$app->params['jwt'];
        $time = time();

        $payload = [
            'issuer' => $jwtParams['issuer'],
            'audience' => $jwtParams['audience'],
            'created_at' => $time,
            'expire_at' => $time + $jwtParams['expire'],
            'user_id' => Yii::$app->user->getId(),
        ];

        return JWT::encode($payload, $jwtParams['secret'], $jwtParams['algorithm']);
    }

    /**
     * Генерация RefreshToken и сохранение его в БД
     *
     * @return AuthTokens
     * @throws Exception
     * @throws RuntimeException
     */
    public function generateAuthToken(): AuthTokens
    {
        $refreshToken = Yii::$app->security->generateRandomString();

        if ($authTokens = $this->findExistsIpAndUserAgent()) {
            $authTokens->value = $refreshToken;
        } else {
            $authTokens = new AuthTokens([
                'users__id' => Yii::$app->user->getId(),
                'value' => $refreshToken,
                'ip_address' => Yii::$app->request->userIP,
                'http_user_agent' => Yii::$app->request->userAgent,
            ]);
        }

        if (!$authTokens->save()) {
            throw new RuntimeException('Failed to save the refresh token');
        }

        return $authTokens;
    }

    /**
     * Поиск токена пользователя, у которого совпадает IP и UserAgent
     *
     * @return AuthTokens|null
     */
    private function findExistsIpAndUserAgent(): ?AuthTokens
    {
        $userRefreshTokens = AuthTokens::findByUserIdAndAgent(Yii::$app->user->getId(), Yii::$app->request->userAgent);

        if (empty($userRefreshTokens)) {
            return null;
        }

        return $userRefreshTokens;
    }

    /**
     * Получить JWT-токен из заголовка
     *
     * @return null|string
     */
    public function getJwtFromHeader(): ?string
    {
        $authHeader = Yii::$app->request->getHeaders()->get('Authorization');

        if ($authHeader !== null && preg_match("/^Bearer\\s+(.*?)$/", $authHeader, $matches)) {
            return (string)$matches[1];
        }

        return null;
    }

    /**
     * Получить раскодированный JWT-токен
     *
     * @return object|null
     */
    public function getDecodedJwt()
    {
        if (empty($token = $this->getJwtFromHeader())) {
            return null;
        }

        $jwtParams = Yii::$app->params['jwt'];

        try {
            $decodedJwt = JWT::decode($token, new Key($jwtParams['secret'], $jwtParams['algorithm']));

            if (empty($decodedJwt->eat)) {
                throw new UnauthorizedHttpException(Yii::t('api', 'Токен не валидный'));
            }

            if (time() > $decodedJwt->eat) {
                throw new UnauthorizedHttpException(Yii::t('api', 'Токен истек. Запросите новый токен'));
            }

            return $decodedJwt;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
