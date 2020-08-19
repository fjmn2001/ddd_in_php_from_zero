<?php

declare(strict_types=1);

namespace MN\Christian\Shared\Infrastructure\Doctrine;

use MN\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class ChristianEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__. '/../../../../../database/christian.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(DIR . '/../../../../Christian', 'MN\Christian')
        );

        $dbalCustomTypesClasses = DbalTypeSearcher::inPath(DIR . '/../../../../Christian', 'Christian');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
