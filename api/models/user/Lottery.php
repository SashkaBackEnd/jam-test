<?php

namespace api\models\user;

use api\models\User;
use common\models\base\LotteryTicket;

class Lottery extends User
{
    /**
     * Gets query for [[LotteryTicket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLotteryTickets(): \yii\db\ActiveQuery
    {
        return $this->hasOne(LotteryTicket::className(), ['users__id' => 'id']);
    }

}
