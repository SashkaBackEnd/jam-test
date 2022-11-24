<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ConfigGroups]].
 *
 * @see \common\models\base\ConfigGroups
 */
class ConfigGroupsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ConfigGroups[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ConfigGroups|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
