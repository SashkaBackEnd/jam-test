<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\QiwiServiceBills]].
 *
 * @see \common\models\base\QiwiServiceBills
 */
class QiwiServiceBillsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\QiwiServiceBills[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\QiwiServiceBills|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
