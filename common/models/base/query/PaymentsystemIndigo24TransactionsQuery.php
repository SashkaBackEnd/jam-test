<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\PaymentsystemIndigo24Transactions]].
 *
 * @see \common\models\base\PaymentsystemIndigo24Transactions
 */
class PaymentsystemIndigo24TransactionsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\PaymentsystemIndigo24Transactions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\PaymentsystemIndigo24Transactions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
