<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\MatrixTypeActionsUsers]].
 *
 * @see \common\models\base\MatrixTypeActionsUsers
 */
class MatrixTypeActionsUsersQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\MatrixTypeActionsUsers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\MatrixTypeActionsUsers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
