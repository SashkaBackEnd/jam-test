<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\FinanceTransactionsStatusesRoles]].
 *
 * @see \common\models\base\FinanceTransactionsStatusesRoles
 */
class FinanceTransactionsStatusesRolesQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\FinanceTransactionsStatusesRoles[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\FinanceTransactionsStatusesRoles|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
