<?php

declare(strict_types=1);

namespace admin\modules\lottery\models;

use admin\models\LotteryTicket as AdminLotteryTicket;

class TicketGroup extends AdminLotteryTicket
{
    public string $group;
    public string $date;
}
