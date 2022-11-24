<?php

declare(strict_types=1);

namespace admin\helpers;

use common\components\Language;
use common\models\base\CountryTranslation;
use yii\helpers\ArrayHelper;

class CommonHelper
{
    /**
     * Варианты выбора для булевых значений
     *
     * @return string[]
     */
    public static function lstVariantForBoolean(): array
    {
        return [
            0 => \Yii::t('app', 'Нет'),
            1 => \Yii::t('app', 'Да')
        ];
    }

    /**
     * Список стран
     *
     * @return array
     */
    public static function listOfCountries(): array
    {
        return ArrayHelper::map(
            CountryTranslation::find()->where(['eas_lang_id' => Language::getCurrentId()])->all(),
            'country_id',
            'name'
        );
    }

    /**
     * Преобразование переданной цены в копейки
     *
     * @param $price
     * @return float|int|null
     */
    public static function preparePrice($price)
    {
        $price = strval($price);

        if (empty($price) or $price == '-' or mb_strripos($price, '-') !== false) {
            return null;
        }

        $price = str_replace(',', '.', $price);
        $price = str_replace(' ', '', $price);
        $price = trim(str_replace(' ', '', $price));

        $price = floatval($price);
        $price = round($price, 2);

        return $price * 100;
    }
}
