<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\TranslateServicesExclude]].
 *
 * @see \common\models\base\TranslateServicesExclude
 */
class TranslateServicesExcludeQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\TranslateServicesExclude[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\TranslateServicesExclude|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
