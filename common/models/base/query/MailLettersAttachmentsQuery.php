<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\MailLettersAttachments]].
 *
 * @see \common\models\base\MailLettersAttachments
 */
class MailLettersAttachmentsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\MailLettersAttachments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\MailLettersAttachments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
