<?php

declare(strict_types=1);

namespace api\modules\rest\forms;

use api\exceptions\ForbiddenHttpException;
use api\models\Langs;
use api\models\Profile;
use api\models\User;
use common\models\base\ProfileLang;
use common\services\UserService;
use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;

/**
 * Форма регистрации пользователя и его компании
 */
class RegistrationForm extends Model
{
    public string $username;
    public string $phone;
    public string $email;
    public string $password;
    public string $password_confirmed;
    public string $sponsor_login;
    public string $fio;
    public bool $agreement;
    public bool $private_policy;
    public bool $personal_data;

    public function rules(): array
    {
        return [
            [
                [
                    'username',
                    'phone',
                    'email',
                    'password',
                    'password_confirmed',
                    'agreement',
                    'private_policy',
                    'personal_data'
                ],
                'required'
            ],
            [['email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['fio', 'sponsor_login', 'username'], 'string'],
            [['agreement', 'private_policy', 'personal_data'], 'boolean'],
            ['email', 'email'],
            [['password', 'password_confirmed'], 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['password_confirmed', 'validatePasswordConfirmed'],
            ['username', 'validateUsername'],
            ['username', 'validateUsername'],
            ['agreement', 'validateAgreement'],
            ['private_policy', 'validatePrivatePolicy'],
            ['personal_data', 'validatePersonalData'],
        ];
    }

    public function validateSponsorLogin(): void
    {
        if (!empty($this->sponsor_login) && !User::findOne(['username' => $this->sponsor_login])) {
            $this->addError('username', Yii::t('api', 'К сожалению, такого спонсора не существует'));
        }
    }

    public function validateUsername(): void
    {
        if (User::findOne(['username' => $this->username])) {
            $this->addError('username', Yii::t('api', 'К сожалению, такой логин занят. Выберите другой'));
        }
    }

    public function validatePasswordConfirmed(): void
    {
        if ($this->password != $this->password_confirmed) {
            $this->addError('username', Yii::t('api', 'Пароль должен быть повторен в точности'));
        }
    }

    public function validateAgreement(): void
    {
        if (!$this->agreement) {
            $this->addError('agreement', Yii::t('api', 'Вы должны согласиться с условиями договора оферты'));
        }
    }

    public function validatePrivatePolicy(): void
    {
        if (!$this->agreement) {
            $this->addError('private_policy', Yii::t('api', 'Вы должны согласиться с политикой конфиденциальности'));
        }
    }

    public function validatePersonalData(): void
    {
        if (!$this->agreement) {
            $this->addError('personal_data', Yii::t('api', 'Вы должны согласиться с обработкой персональных данных'));
        }
    }

//    /**
//     * Назначить роли и разрешения новому пользователю
//     *
//     * @param User $user
//     * @return void
//     */
//    private function bindRoleAndPermission(User $user): void
//    {
//        // TODO: пока по дефолту Retail. Но на фронте будет выбор типа компании
//        Rbac::bindUserAndRole($user->id, RoleHelper::CLIENT_RETAIL_PHARMACY);
//
//        // TODO: пока по дефолту Retail. Но на фронте будет выбор типа компании
//        Rbac::bindUserAndPermission($user->id, PermissionHelper::PERMISSION_RETAIL_PHARMACY);
//    }

    /**
     * @throws ForbiddenHttpException
     */
    public function registration(): ?User
    {
        if (!$this->validate()) {
            return null;
        }

        $user = UserService::registration($this);

        if (!$user->hasErrors()) {
            Yii::$app->user->login($user);
        }

        return $user;
    }
}
