<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\FinanceWalletsStatuses]].
 *
 * @see \common\models\base\FinanceWalletsStatuses
 */
class FinanceWalletsStatusesQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\FinanceWalletsStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\FinanceWalletsStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
