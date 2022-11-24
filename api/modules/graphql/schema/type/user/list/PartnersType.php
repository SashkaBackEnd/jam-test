<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\list;

use api\exceptions\IContextableException;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\PartnerType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\Type;

class PartnersType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => '',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(PartnerType::class)),
            ],

            'resolve' => function (User $model) {
                try {
                    return $model->profile?->getChildren()->getArrayEntity();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }

        ]);
    }
}
