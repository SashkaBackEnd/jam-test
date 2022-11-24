<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\MatrixTypeActionsUsersHistory]].
 *
 * @see \common\models\base\MatrixTypeActionsUsersHistory
 */
class MatrixTypeActionsUsersHistoryQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\MatrixTypeActionsUsersHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\MatrixTypeActionsUsersHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
