<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\UsersRegisterSecurityParams]].
 *
 * @see \common\models\base\UsersRegisterSecurityParams
 */
class UsersRegisterSecurityParamsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\UsersRegisterSecurityParams[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\UsersRegisterSecurityParams|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
