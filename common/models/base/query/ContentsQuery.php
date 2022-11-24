<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\Contents]].
 *
 * @see \common\models\base\Contents
 */
class ContentsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\Contents[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\Contents|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
