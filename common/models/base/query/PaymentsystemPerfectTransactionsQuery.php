<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\PaymentsystemPerfectTransactions]].
 *
 * @see \common\models\base\PaymentsystemPerfectTransactions
 */
class PaymentsystemPerfectTransactionsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\PaymentsystemPerfectTransactions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\PaymentsystemPerfectTransactions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
