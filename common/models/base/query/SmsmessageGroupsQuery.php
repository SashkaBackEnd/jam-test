<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\SmsmessageGroups]].
 *
 * @see \common\models\base\SmsmessageGroups
 */
class SmsmessageGroupsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\SmsmessageGroups[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\SmsmessageGroups|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
