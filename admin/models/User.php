<?php

declare(strict_types=1);

namespace admin\models;

use common\models\User as CommonUser;
use yii\web\IdentityInterface;

class User extends CommonUser implements IdentityInterface
{

}
