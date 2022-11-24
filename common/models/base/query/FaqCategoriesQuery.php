<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\FaqCategories]].
 *
 * @see \common\models\base\FaqCategories
 */
class FaqCategoriesQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\FaqCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\FaqCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
