<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\MessageActions]].
 *
 * @see \common\models\base\MessageActions
 */
class MessageActionsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\MessageActions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\MessageActions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
