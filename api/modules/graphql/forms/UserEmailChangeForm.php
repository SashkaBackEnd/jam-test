<?php

namespace api\modules\graphql\forms;

use api\exceptions\{RuntimeException};
use api\models\User;
use Yii;
use yii\base\Model;

/**
 * Форма для изменения email пользователя
 */
class UserEmailChangeForm extends Model
{
    public int $id;
    public string $email;
    public string $password;

    public User $user;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'checkUniqueEmail'],
            ['password', 'validatePassword'],
        ];
    }

    public function checkUniqueEmail()
    {
        if (User::existsEmail($this->email)) {
            $this->addError('email', Yii::t('api', 'Этот e-mail уже используется'));
        }
    }

    public function validatePassword()
    {
        if (!$this->user->validatePassword($this->password)) {
            $this->addError('password', Yii::t('api', 'Пароль неверен'));
        }
    }

    public function save()
    {
        $this->user->email_new = $this->email;
        $this->user->generateEmailVerificationToken();

        if ($this->user->save()) {
            $this->user->sendChangeEmailConfirmAccount();

            return true;
        }

        throw (new RuntimeException(Yii::t('api', 'Не удалось изменить email пользователя')))
            ->setContext(['fields' => $this->user->getErrors()]);
    }
}
