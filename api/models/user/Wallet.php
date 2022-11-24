<?php

namespace api\models\user;

use common\components\ActiveQuery;
use common\models\base\FinanceWallets as BaseFinanceWallets;

class Wallet extends BaseFinanceWallets
{
    /**
     * @return ActiveQuery
     */
    public function getOperations(): ActiveQuery
    {
        return $this->hasMany(StoreHorders::className(), ['users__id' => 'id']);
    }

}
