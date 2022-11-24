<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\OfficeWalletsOperations]].
 *
 * @see \common\models\base\OfficeWalletsOperations
 */
class OfficeWalletsOperationsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\OfficeWalletsOperations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\OfficeWalletsOperations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
