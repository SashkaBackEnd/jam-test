<?php

namespace api\models;

use common\extensions\BehaviorHelper;
use common\models\base\AuthTokens as BaseAuthTokens;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Yii;

class AuthTokens extends BaseAuthTokens
{
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
                'author_id' => BehaviorHelper::getBehaviorBy(),
                'author_ip' => BehaviorHelper::getBehaviorIp(),
                'author_timestamp' => BehaviorHelper::getBehaviorAt(),
            ] + parent::behaviors();
    }

    /**
     * @param int $userId
     * @param string $agent
     * @return array
     */
    public static function findByUserIdAndAgent(int $userId, string $agent): ?AuthTokens
    {
        return static::find()
            ->byUserId($userId)
            ->byHttpUserAgent($agent)
            ->one();
    }

    /**
     * @param int $userId
     * @param string $agent
     * @return array
     */
    public static function findRefreshToken($token): ?AuthTokens
    {
        $jwtParams = Yii::$app->params['jwt'];

        $decodedJwt = JWT::decode($token, new Key($jwtParams['secret'], $jwtParams['algorithm']));

        return static::find()
            ->byUserId($decodedJwt->user_id)
            ->byHttpUserAgent(Yii::$app->request->userAgent)
            ->byValue($decodedJwt->value)
            ->one();
    }

    /**
     * @param int $userId
     * @param string $agent
     * @return static|null
     */
    public static function findByUserIdAndUserAgent(int $userId, string $agent): ?static
    {
        return static::findOne([
            'urf_userID' => $userId,
            'urf_user_agent' => $agent,
        ]);
    }

    public function getRefreshToken(): string
    {
        $jwtParams = Yii::$app->params['jwt'];

        $payload = [
            'created_at' => time(),
            'value' => $this->value,
            'user_id' => $this->users__id,
        ];

        return JWT::encode($payload, $jwtParams['secret'], $jwtParams['algorithm']);
    }
}
