<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type;

use api\exceptions\ForbiddenHttpException;
use api\exceptions\IContextableException;
use api\exceptions\UnauthorizedHttpException;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\FinanceType;
use api\modules\graphql\schema\type\user\list\BonusesType;
use api\modules\graphql\schema\type\user\list\CalendarEventsType;
use api\modules\graphql\schema\type\user\list\OrdersType;
use api\modules\graphql\schema\type\user\LotteryType;
use api\modules\graphql\schema\type\user\PackageType;
use api\modules\graphql\schema\type\user\PartnerType;
use api\modules\graphql\schema\type\user\PermissionsType;
use api\modules\graphql\schema\type\user\ProfileType;
use api\modules\graphql\schema\type\user\SponsorType;
use api\modules\graphql\schema\type\user\VerificationType;
use api\modules\graphql\schema\type\user\warehouse\list\StorekeepersType;
use api\modules\graphql\schema\type\user\WarehouseType;
use api\modules\graphql\schema\TypeRegistry;
use api\traits\TraitAuthenticate;
use GraphQL\Type\Definition\Type;
use Yii;

class UserType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'description' => 'Раздел пользователя',
            'fields' => fn() => [
                'id' => Type::id(),
                'username' => [
                    'description' => 'Логин',
                    'type' => Type::string(),
                ],
                'email' => [
                    'description' => 'Email',
                    'type' => Type::string(),
                ],
                'permissions' => TypeRegistry::get(PermissionsType::class)->getConfig(),
                'lottery' => TypeRegistry::get(LotteryType::class)->getConfig(),
                'warehouse' => [
                    'type' => TypeRegistry::get(WarehouseType::class),
                    'resolve' => function (User $model) {
                        return $model->warehouse ?? null;
                    }
                ],
                'profile' => [
                    'type' => TypeRegistry::get(ProfileType::class),
                    'resolve' => function (User $model) {
                        return $model->profile ?? null;
                    }
                ],
                'calendarEvents' => TypeRegistry::get(CalendarEventsType::class)->getConfig(),
                'bonuses' => TypeRegistry::get(BonusesType::class)->getConfig(),
                'finance' => TypeRegistry::get(FinanceType::class)->getConfig(),
//                'last_activity' => TypeRegistry::get(LastActivityType::class)->getConfig(),
                'package' => TypeRegistry::get(PackageType::class)->getConfig(),
                'orders' => TypeRegistry::get(OrdersType::class)->getConfig(),
                'storekeepers' => TypeRegistry::get(StorekeepersType::class)->getConfig(),
                'verification' => TypeRegistry::get(VerificationType::class)->getConfig(),
                'sponsor' => [
                    'type' => TypeRegistry::get(SponsorType::class),
                    'resolve' => function (User $model) {
                        return $model->profile->sponsor ?? null;
                    }
                ],
                'date_end_activity' => [
                    'type' => Type::string(),
                    'resolve' => function (User $model) {
                        return $model->getDateEndActivity()?->format('Y-m-d') ?? null;
                    }
                ],
                'partner' => [
                    'type' => TypeRegistry::get(PartnerType::class),
                    'args' => [
                        'id' => Type::int()
                    ],
                    'resolve' => function (User $model, array $args) {
                        $data = $model;
                        if (isset($args['id']) && !$data = User::find()
                                ->joinWith('profile')
                                ->where(['users.id' => $args['id']])
                                ->andWhere(['LIKE', 'profile.upline', $model->profile->upline . '%', false])
                                ->one()) {
                            throw new ForbiddenHttpException();
                        }

                        return $data;
                    }
                ],
            ],
            'resolve' => function () {
                try {
                    if (!$user = Yii::$app->user->getIdentity()) {
                        throw new UnauthorizedHttpException('Необходимо авторизоваться');
                    }

                    return $user;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
