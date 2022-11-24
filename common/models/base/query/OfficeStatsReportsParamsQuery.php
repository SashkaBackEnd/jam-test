<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\OfficeStatsReportsParams]].
 *
 * @see \common\models\base\OfficeStatsReportsParams
 */
class OfficeStatsReportsParamsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\OfficeStatsReportsParams[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\OfficeStatsReportsParams|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
