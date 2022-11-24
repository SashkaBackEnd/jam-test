<?php

namespace common\models\base\query;

use common\models\base\AuthTokens;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\base\AuthTokens]].
 *
 * @see \common\models\base\AuthTokens
 */
class AuthTokensQuery extends \common\components\ActiveQuery
{
    /**
     * @param int $userId
     * @return AuthTokensQuery
     */
    public function byUserId(int $userId): AuthTokensQuery
    {
        return $this->andWhere(['users__id' => $userId]);
    }

    /**
     * @param string $httpUserAgent
     * @return AuthTokensQuery
     */
    public function byHttpUserAgent(string $httpUserAgent): AuthTokensQuery
    {
        return $this->andWhere(['http_user_agent' => $httpUserAgent]);
    }

    /**
     * @param string $value
     * @return AuthTokensQuery
     */
    public function byValue(string $value): AuthTokensQuery
    {
        return $this->andWhere(['value' => $value]);
    }

    /**
     * {@inheritdoc}
     * @return AuthTokens[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AuthTokens|array|null
     */
    public function one($db = null): AuthTokens|array|null
    {
        return parent::one($db);
    }
}
