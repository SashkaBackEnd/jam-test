<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\AdminVerification as BaseAdminVerification;
use common\models\query\UserQuery;
use yii\db\ActiveQueryInterface;

class Verification extends BaseAdminVerification
{
    /**
     * Gets query for [[User]].
     *
     * @return ActiveQueryInterface|UserQuery
     */
    public function getUser(): ActiveQueryInterface|UserQuery
    {
        return $this->hasOne(User::className(), ['id' => 'users__id']);
    }

}
