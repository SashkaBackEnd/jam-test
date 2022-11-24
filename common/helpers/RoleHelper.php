<?php

declare(strict_types=1);

namespace common\helpers;

use yii\helpers\ArrayHelper;

/**
 * Хелпер для хранения констант с именами RBAC-ролей.
 */
class RoleHelper
{
    /**
     * Роль - "администратор".
     * Имеет полный доступ к системе
     */
    public const ADMINISTRATOR = 'administrator';

    /**
     * Роль - "менеджер".
     * Имеет доступ к функционалу в CP
     */
    public const MANAGER = 'manager';

    // Роли для клиентов
    public const CLIENT_HOSPITAL = 'hospital';
    public const CLIENT_CLINIC = 'clinic';
    public const CLIENT_INSTITUTION = 'institution';
    public const CLIENT_DISTRIBUTOR = 'distributor';
    public const CLIENT_TRADER = 'trader';
    public const CLIENT_SCIENTIFIC_OFFICE = 'scientific_office';
    public const CLIENT_PHARMA_MANUFACTURER = 'pharmaceutical_manufacturer';
    public const CLIENT_API_MANUFACTURER = 'api_manufacturer';
    public const CLIENT_RETAIL_PHARMACY = 'retail_pharmacy';
    public const CLIENT_CHAIN_PHARMACY = 'chain_pharmacy';

    // Описание ролей
    public const DESCRIPTION_ADMINISTRATOR = 'Administrator';
    public const DESCRIPTION_MANAGER = 'Manager';
    public const DESCRIPTION_HOSPITAL = 'Hospital';
    public const DESCRIPTION_CLINIC = 'Clinic';
    public const DESCRIPTION_INSTITUTION = 'Institution';
    public const DESCRIPTION_DISTRIBUTOR = 'Distributor';
    public const DESCRIPTION_TRADER = 'Trader';
    public const DESCRIPTION_SCIENTIFIC_OFFICE = 'Scientific Office';
    public const DESCRIPTION_PHARMA_MANUFACTURER = 'Pharmaceutical Manufacturer';
    public const DESCRIPTION_API_MANUFACTURER = 'API Manufacturer';
    public const DESCRIPTION_RETAIL_PHARMACY = 'Retail Pharmacy';
    public const DESCRIPTION_CHAIN_PHARMACY = 'Chain pharmacy';

    /**
     * Массив ролей
     * @return string[]
     */
    public static function getRoleArray()
    {
        return [
            self::ADMINISTRATOR => self::DESCRIPTION_ADMINISTRATOR,
            self::MANAGER => self::DESCRIPTION_MANAGER,
            self::CLIENT_HOSPITAL => self::DESCRIPTION_HOSPITAL,
            self::CLIENT_CLINIC => self::DESCRIPTION_CLINIC,
            self::CLIENT_INSTITUTION => self::DESCRIPTION_INSTITUTION,
            self::CLIENT_DISTRIBUTOR => self::DESCRIPTION_DISTRIBUTOR,
            self::CLIENT_TRADER => self::DESCRIPTION_TRADER,
            self::CLIENT_SCIENTIFIC_OFFICE => self::DESCRIPTION_SCIENTIFIC_OFFICE,
            self::CLIENT_PHARMA_MANUFACTURER => self::DESCRIPTION_PHARMA_MANUFACTURER,
            self::CLIENT_API_MANUFACTURER => self::DESCRIPTION_API_MANUFACTURER,
            self::CLIENT_RETAIL_PHARMACY => self::DESCRIPTION_RETAIL_PHARMACY,
            self::CLIENT_CHAIN_PHARMACY => self::DESCRIPTION_CHAIN_PHARMACY,
        ];
    }

    /**
     * Геттер описания роли
     *
     * @param $key
     * @return mixed|null
     */
    public static function getRoleDisplay($key)
    {
        return ArrayHelper::getValue(static::getRoleArray(), $key);
    }

    /**
     * Список ролей для компании
     *
     * @return array
     */
    public static function getRoleCompanyList(): array
    {
        $roles = RoleHelper::getRoleArray();
        unset($roles[RoleHelper::ADMINISTRATOR]);
        unset($roles[RoleHelper::MANAGER]);

        return $roles;
    }
}
