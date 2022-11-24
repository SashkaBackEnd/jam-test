<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\Profile;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\CityType;
use api\modules\graphql\schema\type\segment\CountryType;
use api\modules\graphql\schema\type\segment\RegionType;
use api\modules\graphql\schema\type\segment\SexType;
use api\modules\graphql\schema\TypeRegistry;
use api\traits\TraitAuthenticate;
use GraphQL\Type\Definition\Type;

class ProfileType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'description' => 'Раздел пользователя',
            'fields' => fn() => [
                'id' => Type::id(),
                'phone' => [
                    'description' => 'Мобильный телефон',
                    'type' => Type::string(),
                ],
                'telegram_username' => [
                    'description' => 'Адрес регистрации',
                    'type' => Type::string(),
                ],
                'zip_code' => [
                    'description' => 'Почтовый индекс',
                    'type' => Type::string(),
                ],
                'series_passport' => [
                    'description' => 'Серия и номер паспорта',
                    'type' => Type::string(),
                ],
                'taxpayer_identification_number' => [
                    'description' => 'Идентификационный номер налогоплательщика (ИНН)',
                    'type' => Type::string(),
                ],
                'birthday' => [
                    'description' => 'Дата рождения',
                    'type' => Type::string(),
                ],
                'skype' => [
                    'description' => 'Skype',
                    'type' => Type::string(),
                ],
                'bank_name' => [
                    'description' => 'Название банка',
                    'type' => Type::string(),
                ],
                'checking_account' => [
                    'description' => 'Расчётный счёт',
                    'type' => Type::string(),
                ],
                'bik_number' => [
                    'description' => 'БИК',
                    'type' => Type::string(),
                ],
                'sex' => [
                    'type' => TypeRegistry::get(SexType::class),
                    'resolve' => function (Profile $model) {
                        return match ($model->sex) {
                            1 => ['id' => $model->sex, 'name' => 'Мужской'],
                            2 => ['id' => $model->sex, 'name' => 'Женский'],
                            default => null,
                        };
                    }
                ],
                'first_name' => [
                    'description' => 'Имя',
                    'type' => Type::string(),
                ],
                'last_name' => [
                    'description' => 'Фамилия',
                    'type' => Type::string(),
                ],
                'second_name' => [
                    'description' => 'Отчество',
                    'type' => Type::string(),
                ],
                'address' => [
                    'description' => 'Адрес регистрации',
                    'type' => Type::string(),
                ],
                'lang' => [
                    'type' => TypeRegistry::get(ProfileLangType::class),
                    'resolve' => function (Profile $model) {
                        return $model->lang ?? null;
                    }
                ],
                'country' => [
                    'type' => TypeRegistry::get(CountryType::class),
                    'resolve' => function (Profile $model) {
                        return $model->country ?? null;
                    }
                ],
                'region' => [
                    'type' => TypeRegistry::get(RegionType::class),
                    'resolve' => function (Profile $model) {
                        return $model->region ?? null;
                    }
                ],
                'city' => [
                    'type' => TypeRegistry::get(CityType::class),
                    'resolve' => function (Profile $model) {
                        return $model->city ?? null;
                    }
                ],
            ],
            'resolve' => function (User $model) {
                try {
                    return $model->profile ?? null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
