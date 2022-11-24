<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\Profile;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\ProductType;
use api\modules\graphql\schema\TypeRegistry;
use common\models\OrderItem;
use GraphQL\Type\Definition\Type;

class PackageType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Тарифный план пользователя (пакет)',
            'fields' => fn() => [
                'id' => Type::id(),
                'date_buy' => [
                    'description' => 'Дата покупки',
                    'type' => Type::string(),
                    'resolve' => function (OrderItem $model) {
                        return $model->created_at ?? null;
                    }
                ],
                'product' => TypeRegistry::get(ProductType::class)->getConfig(),
            ],
            'resolve' => function (User $model) {
                try {
                    return $model->getStartPackage()->one();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
