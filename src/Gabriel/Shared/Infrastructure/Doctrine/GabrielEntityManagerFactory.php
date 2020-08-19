<?php

declare(strict_types=1);


namespace MN\Gabriel\Shared\Infrastructure\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use MN\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class GabrielEntityManagerFactory
{
        private const SCHEMA_PATH = __DIR__ . '/../../../../../databases/gabriel.sql';

        public static function create(array $parameters, string $environment): EntityManagerInterface
        {
            $isDevMode = 'prod' !== $environment;

            $prefixes = array_merge(
                DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Gabriel', 'MN\Gabriel')
            );

            $dbalCustomTypesClasses = DbalTypeSearcher::inPath(__DIR__ . '/../../../../Gabriel', 'Gabriel');


            return DoctrineEntityManagerFactory::create(
                $parameters,
                $prefixes,
                $isDevMode,
                self::SCHEMA_PATH,
                $dbalCustomTypesClasses
            );
        }
}