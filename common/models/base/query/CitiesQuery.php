<?php

namespace common\models\base\query;

use common\models\base\Cities;
use common\models\base\CitiesLang;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\base\Cities]].
 *
 * @see \common\models\base\Cities
 */
class CitiesQuery extends \common\components\ActiveQuery
{
    /**
     * @param int $country_id
     * @return CitiesQuery
     */
    public function byCountry(int $country_id): CitiesQuery
    {
        return $this->andWhere([Cities::tableName() . '.country_id' => $country_id]);
    }

    /**
     * @param int $region_id
     * @return CitiesQuery
     */
    public function byRegion(int $region_id): CitiesQuery
    {
        return $this->andWhere([Cities::tableName() . '.region_id' => $region_id]);
    }

    /**
     * @return CitiesQuery
     */
    public function sortDefault(): CitiesQuery
    {
        return $this->orderBy([Cities::tableName() . '.sort_no' => SORT_ASC]);
    }

    /**
     * @return CitiesQuery
     */
    public function sortTranslationName(): CitiesQuery
    {
        return $this->orderBy([CitiesLang::tableName() . '.name' => SORT_ASC]);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\Cities[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\Cities|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
