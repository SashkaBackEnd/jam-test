<?php

declare(strict_types=1);

namespace api\models;

use common\models\Country as CommonCountry;
use common\models\base\CitiesLang;
use common\models\base\query\CitiesQuery;
use yii\db\ActiveQueryInterface;
use yii\db\Expression;

class Country extends CommonCountry
{
    /**
     * Gets query for [[Country]].
     *
     * @return ActiveQueryInterface
     */
    public function getLang(): ActiveQueryInterface
    {
        return $this->hasOne(CitiesLang::className(), ['city__id' => 'id'])
            ->andWhere([CitiesLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * {@inheritdoc}
     * @return CitiesQuery the active query used by this AR class.
     */
    public static function find(): CitiesQuery
    {
        return (new CitiesQuery(get_called_class()))
            ->andWhere(['IS NOT', self::tableName() . '.sort_no', new Expression('null')])
            ->andWhere([self::tableName() . '.type' => 1]);
    }
}
