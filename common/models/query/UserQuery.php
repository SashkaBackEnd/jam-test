<?php

namespace common\models\query;

use common\components\ActiveQuery;
use common\models\User;
use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[\common\models\User]].
 *
 * @see \common\models\User
 */
class UserQuery extends ActiveQuery
{
    /**
     * @param int $id
     * @return UserQuery
     */
    public function byId(int $id): UserQuery
    {
        return $this->andWhere(['users.id' => $id]);
    }

    /**
     * @param string $firstName
     * @return UserQuery
     */
    public function linkUsername(string $firstName): UserQuery
    {
        return $this->andWhere(
                new Expression('users.username LIKE :username', [':username' => $username . '%'])
            );
    }

    /**
     * @param string $firstName
     * @return UserQuery
     */
    public function linkFirstName(string $firstName): UserQuery
    {
        return $this->joinWith('profile')->joinWith('profile.profileLang')
            ->andWhere(
                new Expression('profile_lang.first_name LIKE :first_name', [':first_name' => $firstName . '%'])
            );
    }

    /**
     * @param string $lastName
     * @return UserQuery
     */
    public function linkLastName(string $lastName): UserQuery
    {
        return $this->joinWith('profile')->joinWith('profile.lang')
            ->andWhere(
                new Expression('profile_lang.last_name LIKE :last_name', [':last_name' => $lastName . '%'])
            );
    }

    /**
     * @param string $secondName
     * @return UserQuery
     */
    public function linkSecondName(string $secondName): UserQuery
    {
        return $this->joinWith('profile')->joinWith('profile.profileLang')
            ->andWhere(
                new Expression('profile_lang.second_name LIKE :second_name', [':second_name' => $secondName . '%'])
            );
    }

    /**
     * @param string $email
     * @return UserQuery
     */
    public function byEmail(string $email): UserQuery
    {
        return $this->andWhere(['users.email' => $email]);
    }

    /**
     * @param string $username
     * @return UserQuery
     */
    public function byUsername(string $username): UserQuery
    {
        return $this->andWhere(['users.username' => $username]);
    }

    /**
     * @return UserQuery
     */
    public function active(): UserQuery
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     * @return User[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return User|array|null
     */
    public function one($db = null): array|User|null
    {
        return parent::one($db);
    }
}
