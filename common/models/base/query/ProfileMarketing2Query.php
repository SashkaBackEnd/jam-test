<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ProfileMarketing2]].
 *
 * @see \common\models\base\ProfileMarketing2
 */
class ProfileMarketing2Query extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProfileMarketing2[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProfileMarketing2|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
