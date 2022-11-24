<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\WalletOutQueery]].
 *
 * @see \common\models\base\WalletOutQueery
 */
class WalletOutQueeryQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\WalletOutQueery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\WalletOutQueery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
