<?php

namespace api\modules\rest\forms;

use yii\base\Model;
use api\models\User;

/**
 * Форма проверки валидности токена сброса пароля
 */
class CheckPasswordResetTokenForm extends Model
{
    public $token;

    public function rules()
    {
        return [
            [['token'], 'required'],
            [['token'], 'string'],
        ];
    }

    public function validatePasswordResetToken()
    {
//        return User::isPasswordResetTokenValid($this->token);
    }
}
