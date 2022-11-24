<?php

declare(strict_types=1);

namespace console\helpers;

use common\models\base\Good;

class GoodHelper
{
    /**
     * @param array $data
     * @param int $numberIqviaIdInData
     * @return int|string|null
     */
    public static function determineGoodId(array $data, $numberIqviaIdInData = 0)
    {
        $packKey = $data[$numberIqviaIdInData] ?? $data[0] ?? null;

        if (empty($packKey)) {
            return null;
        } else {
            $packKey = intval($packKey);
        }

        $goodId = Good::getGoodIdByIqviaId($packKey);

        return ($goodId !== false) ? $goodId : null;
    }
}
