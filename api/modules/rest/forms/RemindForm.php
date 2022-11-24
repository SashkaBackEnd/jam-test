<?php

namespace api\modules\rest\forms;

use Yii;
use yii\base\Model;
use api\models\User;

/**
 * Форма для восстановления пароля
 */
class RemindForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'required'],
            [['email'], 'string', 'max' => 50],
            ['email', 'email'],
        ];
    }

    public function remind(): bool
    {
        $user = User::findByEmail($this->email);

        if ($user) {
            $user->generatePasswordResetToken();
            $user->save();

            $user->sendEmailChangePassword();

            return true;
        } else {
            $this->addError('email', Yii::t(
                'api',
                'Пользователь с таким адресом электронной почты не найден, исправьте адрес электронной почты'
            ));
        }

        return false;
    }
}
