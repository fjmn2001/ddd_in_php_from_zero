<?php


declare(strict_types=1);


namespace MN\Francisco\Shared\Infrastructure\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use MN\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class FranciscoEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../database/francisco.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Francisco', 'MN\Francisco')
        );

        $dbalCustomTypesClasses = DbalTypeSearcher::inPath(__DIR__ . '/../../../../Francisco', 'Francisco');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}