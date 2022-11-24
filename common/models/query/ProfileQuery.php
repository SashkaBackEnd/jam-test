<?php

namespace common\models\query;

use common\components\ActiveQuery;
use common\models\Profile;

/**
 * This is the ActiveQuery class for [[\common\models\Profile]].
 *
 * @see \common\models\Profile
 */
class ProfileQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Profile[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Profile|array|null
     */
    public function one($db = null): Profile|array|null
    {
        return parent::one($db);
    }
}
