<?php

namespace common\models\query;

use common\components\ActiveQuery;
use common\models\Wallet;

/**
 * This is the ActiveQuery class for [[\common\models\User]].
 *
 * @see \common\models\Wallet
 */
class WalletQuery extends ActiveQuery
{
    /**
     * @return WalletQuery
     */
    public function byObjectUser(): WalletQuery
    {
        return $this->andWhere([Wallet::tableName() . '.object_alias' => 'users']);
    }

    /**
     * @return WalletQuery
     */
    public function byObjectCompany(): WalletQuery
    {
        return $this->andWhere([Wallet::tableName() . '.object_alias' => 'company']);
    }

    /**
     * {@inheritdoc}
     * @return Wallet[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Wallet|array|null
     */
    public function one($db = null): array|Wallet|null
    {
        return parent::one($db);
    }
}
