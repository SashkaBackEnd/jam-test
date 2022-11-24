<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\WarHordersStatusLang]].
 *
 * @see \common\models\base\WarHordersStatusLang
 */
class WarHordersStatusLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\WarHordersStatusLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\WarHordersStatusLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
