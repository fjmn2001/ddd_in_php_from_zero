<?php

declare(strict_types=1);


namespace MN\Daniel\Shared\Infrastructure\Doctrine;


use Doctrine\ORM\EntityManagerInterface;

final class DanielEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../database/daniel.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Daniel', 'MN\Daniel')
        );

        $dbalCustomTypesClasses = DbalTypeSearcher::inPath(__DIR__ . '/../../../../Daniel', 'Daniel');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}