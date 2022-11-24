<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\UsersGlobalSettingsLang]].
 *
 * @see \common\models\base\UsersGlobalSettingsLang
 */
class UsersGlobalSettingsLangQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\UsersGlobalSettingsLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\UsersGlobalSettingsLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
