<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ProfilePaymentAddressesTether]].
 *
 * @see \common\models\base\ProfilePaymentAddressesTether
 */
class ProfilePaymentAddressesTetherQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProfilePaymentAddressesTether[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProfilePaymentAddressesTether|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
