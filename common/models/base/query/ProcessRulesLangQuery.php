<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\ProcessRulesLang]].
 *
 * @see \common\models\base\ProcessRulesLang
 */
class ProcessRulesLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProcessRulesLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\ProcessRulesLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
