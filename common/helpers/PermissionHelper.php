<?php

declare(strict_types=1);

namespace common\helpers;

/**
 * Хелпер для хранения констант с именами RBAC-разрешений.
 */
class PermissionHelper
{
    // Одноименные разрешения
    const PERMISSION_ADMINISTRATOR = 'administrator.full_access';
    const PERMISSION_MANAGER = 'manager.full_access';
    const PERMISSION_HOSPITAL = 'hospital.full_access';
    const PERMISSION_CLINIC = 'clinic.full_access';
    const PERMISSION_INSTITUTION = 'institution.full_access';
    const PERMISSION_DISTRIBUTOR = 'distributor.full_access';
    const PERMISSION_TRADER = 'trader.full_access';
    const PERMISSION_SCIENTIFIC_OFFICE = 'scientific_office.full_access';
    const PERMISSION_PHARMA_MANUFACTURER = 'pharmaceutical_manufacturer.full_access';
    const PERMISSION_API_MANUFACTURER = 'api_manufacturer.full_access';
    const PERMISSION_RETAIL_PHARMACY = 'retail_pharmacy.full_access';
    const PERMISSION_CHAIN_PHARMACY = 'chain_pharmacy.full_access';
}