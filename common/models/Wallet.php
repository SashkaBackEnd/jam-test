<?php

declare(strict_types=1);

namespace common\models;

use common\components\ActiveQuery;
use common\models\base\FinanceWallets as BaseFinanceWallets;
use common\models\base\query\CompanyQuery;
use common\models\base\query\UsersQuery;
use common\models\query\WalletQuery;
use yii\db\ActiveQueryInterface;

class Wallet extends BaseFinanceWallets
{
    /**
     * @return ActiveQuery|UsersQuery|CompanyQuery
     */
    public function getOwner(): ActiveQueryInterface|UsersQuery|CompanyQuery
    {
        return match ($this->object_alias) {
            'users' => $this->hasOne(User::className(), ['id' => 'object_id']),
            'company' => $this->hasOne(Company::className(), ['id' => 'object_id'])
        };
    }

    /**
     * {@inheritdoc}
     * @return WalletQuery the active query used by this AR class.
     */
    public static function find(): WalletQuery
    {
        return new WalletQuery(get_called_class());
    }

}
