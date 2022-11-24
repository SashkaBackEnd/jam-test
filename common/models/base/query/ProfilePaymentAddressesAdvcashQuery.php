<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ProfilePaymentAddressesAdvcash]].
 *
 * @see \common\models\base\ProfilePaymentAddressesAdvcash
 */
class ProfilePaymentAddressesAdvcashQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProfilePaymentAddressesAdvcash[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProfilePaymentAddressesAdvcash|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
