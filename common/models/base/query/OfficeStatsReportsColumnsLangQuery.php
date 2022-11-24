<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\OfficeStatsReportsColumnsLang]].
 *
 * @see \common\models\base\OfficeStatsReportsColumnsLang
 */
class OfficeStatsReportsColumnsLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\OfficeStatsReportsColumnsLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\OfficeStatsReportsColumnsLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
