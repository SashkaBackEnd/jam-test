<?php

namespace api\modules\graphql\schema\type\segment\list;

use api\exceptions\IContextableException;
use api\models\Country;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\CountryType;
use api\modules\graphql\schema\type\segment\MetaType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{Type};

class CountriesType extends ModifiedObjectType
{
    public function __construct()
    {
        $config = [
            'description' => 'Список стран',
            'fields' => fn() => [
                'meta' => TypeRegistry::get(MetaType::class)->getConfig(),
                'list' => Type::listOf(TypeRegistry::get(CountryType::class)),
            ],
            'resolve' => function ($model, $args) {
                try {
                    return Country::find()->joinWith('lang')->sortDefault()->getArrayEntity();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ];

        parent::__construct($config);
    }
}
