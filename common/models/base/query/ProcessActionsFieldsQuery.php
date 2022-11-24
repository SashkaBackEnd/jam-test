<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ProcessActionsFields]].
 *
 * @see \common\models\base\ProcessActionsFields
 */
class ProcessActionsFieldsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProcessActionsFields[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProcessActionsFields|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
