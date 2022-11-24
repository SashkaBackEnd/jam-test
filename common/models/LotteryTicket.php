<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\LotteryTicket as BaseLotteryTicket;
use yii\db\ActiveQueryInterface;

class LotteryTicket extends BaseLotteryTicket
{
    /**
     * @return ActiveQueryInterface
     */
    public function getUser(): ActiveQueryInterface
    {
        return $this->hasOne(User::className(), ['id' => 'users__id']);
    }
}
