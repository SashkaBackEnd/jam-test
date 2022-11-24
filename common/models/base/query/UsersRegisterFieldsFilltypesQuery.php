<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\UsersRegisterFieldsFilltypes]].
 *
 * @see \common\models\base\UsersRegisterFieldsFilltypes
 */
class UsersRegisterFieldsFilltypesQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\UsersRegisterFieldsFilltypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\UsersRegisterFieldsFilltypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
