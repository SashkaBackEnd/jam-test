<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\FinanceWalletsAccessParams]].
 *
 * @see \common\models\base\FinanceWalletsAccessParams
 */
class FinanceWalletsAccessParamsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\FinanceWalletsAccessParams[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\FinanceWalletsAccessParams|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
