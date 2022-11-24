<?php

declare(strict_types=1);

namespace common\models;

use common\components\ActiveQuery;
use common\models\base\FinanceTransactions as BaseFinanceTransactions;
use common\models\base\query\CompanyQuery;
use common\models\base\query\UsersQuery;
use yii\db\ActiveQueryInterface;

class Transaction extends BaseFinanceTransactions
{
    /**
     * @return ActiveQuery|UsersQuery|CompanyQuery
     */
    public function getToOwner(): ActiveQueryInterface|UsersQuery|CompanyQuery
    {
        return match ($this->debit_object_alias) {
            'users' => $this->hasOne(User::className(), ['id' => 'debit_object_id']),
            'company' => $this->hasOne(Company::className(), ['id' => 'debit_object_id'])
        };
    }

    /**
     * @return ActiveQuery|UsersQuery|CompanyQuery
     */
    public function getFromOwner(): ActiveQueryInterface|UsersQuery|CompanyQuery
    {
        return match ($this->credit_object_alias) {
            'users' => $this->hasOne(User::className(), ['id' => 'credit_object_id']),
            'company' => $this->hasOne(Company::className(), ['id' => 'credit_object_id'])
        };
    }

}
