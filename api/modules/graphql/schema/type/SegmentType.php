<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type;

use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\segment\list\CitiesType;
use api\modules\graphql\schema\type\segment\list\CountriesType;
use api\modules\graphql\schema\type\segment\list\RegionsType;
use api\modules\graphql\schema\type\segment\list\SexesType;
use api\modules\graphql\schema\TypeRegistry;
use api\traits\TraitAuthenticate;

class SegmentType extends ModifiedObjectType
{
    use TraitAuthenticate;

    public function __construct()
    {
        parent::__construct([
            'description' => 'Контент',
            'fields' => fn() => [
                'sexes' => TypeRegistry::get(SexesType::class)->getConfig(),
                'cities' => TypeRegistry::get(CitiesType::class)->getConfig(),
                'regions' => TypeRegistry::get(RegionsType::class)->getConfig(),
                'countries' => TypeRegistry::get(CountriesType::class)->getConfig(),
            ]
        ]);
    }
}
