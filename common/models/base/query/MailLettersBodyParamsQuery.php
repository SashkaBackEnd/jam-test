<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\MailLettersBodyParams]].
 *
 * @see \common\models\base\MailLettersBodyParams
 */
class MailLettersBodyParamsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\MailLettersBodyParams[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\MailLettersBodyParams|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
