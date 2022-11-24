<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\WarHordersType]].
 *
 * @see \common\models\base\WarHordersType
 */
class WarHordersTypeQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\WarHordersType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\WarHordersType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
