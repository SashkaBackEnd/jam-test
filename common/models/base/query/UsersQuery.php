<?php

namespace common\models\base\query;

use common\models\base\Users;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[\common\models\base\Users]].
 *
 * @see \common\models\base\Users
 */
class UsersQuery extends \common\components\ActiveQuery
{
    /**
     * @param int $id
     * @return UsersQuery
     */
    public function byId(int $id): UsersQuery
    {
        return $this->andWhere(['users.id' => $id]);
    }

    /**
     * @param string $firstName
     * @return UsersQuery
     */
    public function linkUsername(string $firstName): UsersQuery
    {
        return $this->andWhere(
                new Expression('users.username LIKE :username', [':username' => $username . '%'])
            );
    }

    /**
     * @param string $firstName
     * @return UsersQuery
     */
    public function linkFirstName(string $firstName): UsersQuery
    {
        return $this->joinWith('profile')->joinWith('profile.profileLang')
            ->andWhere(
                new Expression('profile_lang.first_name LIKE :first_name', [':first_name' => $firstName . '%'])
            );
    }

    /**
     * @param string $lastName
     * @return UsersQuery
     */
    public function linkLastName(string $lastName): UsersQuery
    {
        return $this->joinWith('profile')->joinWith('profile.lang')
            ->andWhere(
                new Expression('profile_lang.last_name LIKE :last_name', [':last_name' => $lastName . '%'])
            );
    }

    /**
     * @param string $secondName
     * @return UsersQuery
     */
    public function linkSecondName(string $secondName): UsersQuery
    {
        return $this->joinWith('profile')->joinWith('profile.profileLang')
            ->andWhere(
                new Expression('profile_lang.second_name LIKE :second_name', [':second_name' => $secondName . '%'])
            );
    }

    /**
     * @param string $email
     * @return UsersQuery
     */
    public function byEmail(string $email): UsersQuery
    {
        return $this->andWhere(['users.email' => $email]);
    }

    /**
     * @param string $username
     * @return UsersQuery
     */
    public function byUsername(string $username): UsersQuery
    {
        return $this->andWhere(['users.username' => $username]);
    }

    /**
     * @return UsersQuery
     */
    public function active(): UsersQuery
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     * @return Users[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Users|array|null
     */
    public function one($db = null): array|Users|null
    {
        return parent::one($db);
    }
}
