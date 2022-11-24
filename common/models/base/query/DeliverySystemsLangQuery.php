<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\DeliverySystemsLang]].
 *
 * @see \common\models\base\DeliverySystemsLang
 */
class DeliverySystemsLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\DeliverySystemsLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\DeliverySystemsLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
