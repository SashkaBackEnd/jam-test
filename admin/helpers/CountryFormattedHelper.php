<?php

declare(strict_types=1);

namespace admin\helpers;

use admin\modules\manager\models\Country\Country;
use Yii;

class CountryFormattedHelper
{
    private static array $countries = [];

    public static function getAllCountries(): array
    {
        if (empty(self::$countries)) {
            self::$countries = Country::getList();
        }

        return self::$countries;
    }

    public static function getText(array $countries): string
    {
        $allCountries = self::getAllCountries();
        $diff = array_diff($allCountries, $countries);

        if (empty($diff)) {
            return Yii::t('app', 'Весь мир');
        }

        $countAllCountries = count($allCountries);
        $countDiffCountries = count($diff);

        if ($countAllCountries / 2 > $countDiffCountries) {
            return Yii::t('app', 'Весь мир кроме') . ' ' . implode(', ', $diff);
        }

        return Yii::t('app', 'Только') . ' ' . implode(', ', $countries);
    }
}
