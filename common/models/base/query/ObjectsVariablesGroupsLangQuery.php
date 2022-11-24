<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ObjectsVariablesGroupsLang]].
 *
 * @see \common\models\base\ObjectsVariablesGroupsLang
 */
class ObjectsVariablesGroupsLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ObjectsVariablesGroupsLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ObjectsVariablesGroupsLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
