<?php

namespace api\modules\graphql\forms;

use api\exceptions\UnprocessableEntityException;
use api\models\User;
use Yii;
use yii\base\Model;

/**
 * Форма для изменения пароля пользователя в личном кабинете
 */
class PasswordChangeForm extends Model
{
    public string $password;
    public string $password_new;
    public string $password_confirmed;

    public User $user;

    public function rules()
    {
        return [
            [['password', 'password_new', 'password_confirmed'], 'required'],
            [
                ['password', 'password_new', 'password_confirmed'],
                'string',
                'min' => Yii::$app->params['user.passwordMinLength'],
                'tooShort' => Yii::t(
                    'app',
                    'Пароль должен содержать не менее {count} символов',
                    ['count' => Yii::$app->params['user.passwordMinLength']]
                )
            ],
            ['password_new', 'validateNewPassword'],
        ];
    }

    public function validateNewPassword()
    {
        if ($this->password_new != $this->password_confirmed) {
            $this->addError('password_confirmed', Yii::t('api', 'Новые пароли не совпадают'));
        }
    }

    public function save()
    {
        if (!$this->user->validatePassword($this->password)) {
            throw (new UnprocessableEntityException(Yii::t('api', 'Пароль неверен')));
        }

        $this->user->password_hash = Yii::$app->security->generatePasswordHash($this->password_new);

        return $this->user->save();
    }
}
