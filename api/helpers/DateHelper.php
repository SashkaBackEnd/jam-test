<?php

declare(strict_types=1);

namespace api\helpers;

class DateHelper
{
    public static function dateToTimestamp(?string $date): string
    {
        return $date ? (string)strtotime($date) : '';
    }
}
