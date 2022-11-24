<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\WalletsConfirmationMethodsLang]].
 *
 * @see \common\models\base\WalletsConfirmationMethodsLang
 */
class WalletsConfirmationMethodsLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\WalletsConfirmationMethodsLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\WalletsConfirmationMethodsLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
