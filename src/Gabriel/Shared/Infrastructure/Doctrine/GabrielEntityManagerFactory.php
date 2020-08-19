<?php

declare(strict_types=1);


namespace MN\Gabriel\Shared\Infrastructure\Doctrine;


use Doctrine\ORM\EntityManagerInterface;

final class GabrielEntityManagerFactory
{
        private const SCHEMA_PATH = __DIR__ . '/../../../../../gabriel.sql';

        public static function create(array $paremeters, string $environment): EntityManagerInterface
        {
            $isDevMode = 'prod' !== $environment;

            $prefixes = array_merge(
                DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Gabriel', 'MN\Francisco')
            );

            $dbalCustomTypesClasses = DbalTypeSearcher::inPath(__DIR__ . '/../../../../Gabriel', 'Francisco');

            return DoctrineEntityManagerFactory::create(
                $parameters,
                $prefixes,
                $isDevMode,
                self::SCHEMA_PATH,
                $dbalCustomTypesClasses
            );
        }
}