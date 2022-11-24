<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\FaqCategoriesLang]].
 *
 * @see \common\models\base\FaqCategoriesLang
 */
class FaqCategoriesLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\FaqCategoriesLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\FaqCategoriesLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
