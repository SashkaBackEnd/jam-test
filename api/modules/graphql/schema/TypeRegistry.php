<?php

declare(strict_types=1);

namespace api\modules\graphql\schema;

use ReflectionClass;
use ReflectionException;

final class TypeRegistry
{
    private static array $objectTypes = [];

    /**
     * @param string $name
     * @return ModifiedObjectType|ModifiedEnumType
     * @throws ReflectionException
     */
    public static function get(string $name): ModifiedObjectType|ModifiedEnumType
    {
        $class = new ReflectionClass($name);
        $className = $class->getShortName();

        return self::$objectTypes[$className] ??= new $name();
    }
}
