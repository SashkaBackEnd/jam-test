<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\TranslateLang]].
 *
 * @see \common\models\base\TranslateLang
 */
class TranslateLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\TranslateLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\TranslateLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
