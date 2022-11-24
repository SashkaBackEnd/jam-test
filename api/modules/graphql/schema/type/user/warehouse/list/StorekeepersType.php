<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\warehouse\list;

use api\exceptions\IContextableException;
use api\models\Storekeeper;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\type\user\warehouse\StorekeeperType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class StorekeepersType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Список кладовщиков',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class),
                'list' => Type::listOf(TypeRegistry::get(StorekeeperType::class)),
            ],
            'args' => [
                'filter' => new InputObjectType([
                    'name' => 'FilterStorekeepers',
                    'fields' => [
                        'id' => Type::int(),
                        'username' => Type::string(),
                        'first_name' => Type::string(),
                        'last_name' => Type::string(),
                        'second_name' => Type::string(),
                    ]
                ]),
                'limit' => Type::int(),
                'offset' => Type::int(),
            ],
            'resolve' => function ($model, array $args) {
                try {
                    $user = Storekeeper::find()->joinWith('profile')->joinWith('profile.lang');

                    (isset($args['filter']['id'])) and $user->byId((int)$args['filter']['id']);
                    (isset($args['filter']['username'])) and $user->linkUsername((string)$args['filter']['username']);
                    (isset($args['filter']['first_name'])) and $user->linkFirstName(
                        (string)$args['filter']['first_name']
                    );
                    (isset($args['filter']['last_name'])) and $user->linkLastName((string)$args['filter']['last_name']);
                    (isset($args['filter']['second_name'])) and $user->linkSecondName(
                        (string)$args['filter']['second_name']
                    );

                    $query->limit($args['limit'] ?? null);
                    $query->offset($args['offset'] ?? null);

                    return $user->getArrayEntity();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
