<?php

namespace api\models\user;

use api\models\store\StoreHorders;
use api\models\User;
use common\components\ActiveQuery;

class Store extends User
{
    /**
     * @return ActiveQuery
     */
    public function getStoreHorders(): ActiveQuery
    {
        return $this->hasMany(StoreHorders::className(), ['users__id' => 'id']);
    }

}
