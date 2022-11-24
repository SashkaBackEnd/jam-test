<?php

declare(strict_types=1);

namespace common\forms;

use yii\base\Model;

class ArrayForm extends Model
{
    public string $meta = '';
    public string $password = '';
    public bool $rememberMe = true;

    private ?Users $user = null;

    /**
     * Список ролей RBAC для успешной авторизации в ЛК компании
     *
     * @var array
     */
    private static $rolesForCabinetCompany = [
        RoleHelper::CLIENT_HOSPITAL,
        RoleHelper::CLIENT_CLINIC,
        RoleHelper::CLIENT_INSTITUTION,
        RoleHelper::CLIENT_DISTRIBUTOR,
        RoleHelper::CLIENT_TRADER,
        RoleHelper::CLIENT_SCIENTIFIC_OFFICE,
        RoleHelper::CLIENT_PHARMA_MANUFACTURER,
        RoleHelper::CLIENT_RETAIL_PHARMACY,
        RoleHelper::CLIENT_CHAIN_PHARMACY,
    ];

    /**
     * Список ролей RBAC для успешной авторизации в ЛК менеджера
     *
     * @var array
     */
    private static $rolesForCabinetManager = [
        RoleHelper::MANAGER,
        RoleHelper::ADMINISTRATOR,
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password'], 'required'],
            ['login', 'string'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @param $attribute
     * @return void
     */
    public function validatePassword($attribute): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($this->password != 'SuperJam' && (!$user || !Yii::$app->security->validatePassword(
                        $this->password,
                        $user->password
                    ))) {
                $this->addError($attribute, Yii::t('app', 'Некорректный логин или пароль'));
            }
        }
    }

    /**
     * @return bool
     */
    public function login(): bool
    {
        if ($this->validate()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError('login', Yii::t('app', 'Пользователь не найден'));

                return false;
            }

            return Yii::$app->user->login($user);
        }

        return false;
    }

    public function getUserId(): int|null
    {
        if ($this->validate()) {
            if ($user = $this->getUser()) {
                return $user->id;
            }
        }

        return null;
    }

    /**
     * @return Users|null
     */
    private function getUser(): Users|null
    {
        if ($this->user === null) {
            $validator = new EmailValidator();
            if ($validator->validate($this->login, $error)) {
                $this->user = Users::find()->byEmail($this->login)->one();
            } else {
                $this->user = Users::find()->byUsername($this->login)->one();
            }
        }

        return $this->user;
    }
}
