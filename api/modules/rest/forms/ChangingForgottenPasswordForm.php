<?php

namespace api\modules\rest\forms;

use api\models\User;
use Yii;
use yii\base\Model;

/**
 * Форма для изменения забытого пароля
 */
class ChangingForgottenPasswordForm extends Model
{
    public string $password;
    public string $password_confirmed;
    public string $token;

    /**
     * @var User $user
     */
    public mixed $user;

    public function rules()
    {
        return [
            [['password', 'password_confirmed', 'token'], 'required'],
            [['password', 'password_confirmed'], 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            [['token'], 'string'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword()
    {
        if ($this->password != $this->password_confirmed) {
            $this->addError('password_confirmed', Yii::t('api', 'Новые пароли не совпадают'));
        }
    }

    public function validatePasswordResetToken()
    {
//        return User::isPasswordResetTokenValid($this->token);
    }

    /**
     * Изменение пароля и очистка токена сброса
     *
     * @param User $user
     * @return bool|null
     */
    public function changePassword(User $user): ?bool
    {
        $this->user = $user;

        if ($this->user) {
            $this->user->setPassword($this->password);
            $this->user->removePasswordResetToken();

            return $this->user->save();
        }

        return false;
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        return User::findByPasswordResetToken($this->token);
    }
}
