<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\FoundedCashbackRecipients]].
 *
 * @see \common\models\base\FoundedCashbackRecipients
 */
class FoundedCashbackRecipientsQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\FoundedCashbackRecipients[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\FoundedCashbackRecipients|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
