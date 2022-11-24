<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\Fonts]].
 *
 * @see \common\models\base\Fonts
 */
class FontsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\Fonts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\Fonts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
