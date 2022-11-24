<?php

namespace api\models\user;

use api\models\User;
use common\components\ActiveQuery;

class Finance extends User
{
    /**
     * @param $type
     * @return \yii\db\ActiveQuery
     */
    public function getWallet($type): \yii\db\ActiveQuery
    {
        return $this->hasOne(Wallet::class, ['object_id' => 'id'])
            ->andWhere([
                'object_alias' => 'users',
                'purpose_alias' => $type
            ]);
    }


    /**
     * @return ActiveQuery
     */
    public function getTransactions(): ActiveQuery
    {
        return Transaction::find()
            ->where([
                'OR',
                [
                    'AND',
                    ['debit_object_alias' => 'users'],
                    ['debit_object_id' => $this->id],
                ],
                [
                    'AND',
                    ['credit_object_alias' => 'users'],
                    ['credit_object_id' => $this->id],
                ]
            ]);
    }
}
