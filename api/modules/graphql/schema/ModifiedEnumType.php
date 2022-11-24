<?php

declare(strict_types=1);

namespace api\modules\graphql\schema;

use GraphQL\Type\Definition\{ObjectType};

class ModifiedEnumType extends ObjectType
{
    /**
     * @return array
     */
    public function getConfig(): array
    {
        $config = $this->config;

        if (!isset($config['type'])) {
            $config['type'] = $this;
        }

        if (!isset($config['resolve'])) {
            $config['resolve'] = fn() => $this;
        }

        if (isset($config['name'])) {
            unset($config['name']);
        }

        return $config;
    }
}
