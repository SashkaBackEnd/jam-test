<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\PaymentsystemRobokassaTransactions]].
 *
 * @see \common\models\base\PaymentsystemRobokassaTransactions
 */
class PaymentsystemRobokassaTransactionsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\PaymentsystemRobokassaTransactions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\PaymentsystemRobokassaTransactions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
