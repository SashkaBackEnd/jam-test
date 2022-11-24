<?php

namespace common\components;

use Yii;
use Exception;

/**
 * Компонент для работы с RBAC
 *
 * - На 3 июня 2022 г. весь RBAC построен на проверке ролей (список тут RoleHelper).
 * - Добавлены одноименные разрешения (permission) и каждое разрешение связано со своей ролью. По ним пока проверки нет.
 * - Если будет требования от бизнеса к различным функциям одного и того же раздела, то можно внедрить проверку через
 *      разрешения.
 */
class Rbac
{
    /**
     * Добавление роли в RBAC.
     *
     * @param string $name Наименование.
     * @param string $description Описание.
     * @throws Exception
     */
    public static function createRole($name, $description): void
    {
        $role = Yii::$app->authManager->createRole($name);
        $role->description = $description;
        Yii::$app->authManager->add($role);
    }

    /**
     * Удаление роли из RBAC.
     *
     * @param string $name Наименование.
     */
    public static function deleteRole($name): void
    {
        Yii::$app->authManager->remove(Yii::$app->authManager->getRole($name));
    }

    /**
     * Прикрепление пользователя к роли.
     *
     * @param int $userID Идентификатор пользователя.
     * @param string $roleName Наименование роли.
     * @throws \Exception
     */
    public static function bindUserAndRole($userID, $roleName): void
    {
        $authManager = Yii::$app->authManager;
        $role = $authManager->getRole($roleName);
        $authManager->assign($role, $userID);
    }

    /**
     * Открепление пользователя от роли.
     *
     * @param int    $userID   Идентификатор пользователя.
     * @param string $roleName Наименование роли.
     */
    public static function unbindUserAndRole($userID, $roleName): void
    {
        $authManager = Yii::$app->authManager;
        $role = $authManager->getRole($roleName);
        $authManager->revoke($role, $userID);
    }

    /**
     * Прикрепление пользователя к разрешению.
     *
     * @param int $userID Идентификатор пользователя.
     * @param string $permissionName Наименование разрешения.
     * @throws \Exception
     */
    public static function bindUserAndPermission($userID, $permissionName): void
    {
        $authManager = Yii::$app->authManager;
        $permission = $authManager->getPermission($permissionName);
        $authManager->assign($permission, $userID);
    }

    /**
     * Открепление пользователя от разрешения.
     *
     * @param int    $userID         Идентификатор пользователя.
     * @param string $permissionName Наименование разрешения.
     */
    public static function unbindUserAndPermission($userID, $permissionName): void
    {
        $authManager = Yii::$app->authManager;
        $permission = $authManager->getPermission($permissionName);
        $authManager->revoke($permission, $userID);
    }

    /**
     * Создание разрешения.
     *
     * @param string $name Наименование.
     * @param string $description Описание.
     * @throws \Exception
     */
    public static function createPermission($name, $description): void
    {
        $authManager = Yii::$app->authManager;
        $permission = $authManager->createPermission($name);
        $permission->description = $description;
        $authManager->add($permission);
    }

    /**
     * Удаление разрешения.
     *
     * @param string $permissionName Наименование разрешения.
     */
    public static function removePermission($permissionName): void
    {
        $authManager = Yii::$app->authManager;
        $authManager->remove($authManager->getPermission($permissionName));
    }

    /**
     * Добавление дочернего разрешения к роли.
     *
     * @param string $permissionName Наименование разрешения.
     * @param string $roleName Наименование роли.
     * @throws \yii\base\Exception
     */
    public static function addPermissionChild($permissionName, $roleName): void
    {
        $authManager = Yii::$app->authManager;
        $permission = $authManager->getPermission($permissionName);
        $role = $authManager->getRole($roleName);
        $authManager->addChild($role, $permission);
    }

    /**
     * Удаление дочерного разрешение из роли.
     *
     * @param string $permissionName Наименование разрешения.
     * @param string $roleName       Наименование роли.
     */
    public static function removePermissionChildFromRole($permissionName, $roleName): void
    {
        $authManager = Yii::$app->authManager;
        $authManager->removeChild($authManager->getRole($roleName), $authManager->getPermission($permissionName));
    }

    /**
     * Удаление всех ролей и разрешений пользователя.
     *
     * @param integer $userID Идентификатор пользователя.
     */
    public static function revokeAll($userID): void
    {
        Yii::$app->authManager->revokeAll($userID);
    }

    /**
     * Получить роль идентифицированного пользователя
     *
     * @return string|null
     */
    public static function getRoleByIdentity(): ?string
    {
        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->getId());

        foreach ($roles as $key => $value) {
            return $key;
        }

        return null;
    }
}
