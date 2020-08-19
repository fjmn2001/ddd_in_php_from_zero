<?php

declare(strict_types=1);


namespace MN\Pereira\Shared\Infrastructure\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use MN\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

class PereiraEntityManagerFactory
{
        private const SCHEMA_PATH=__DIR__.'/../../../../../databases/pereira.sql';

        public static function create(array $parameters, string $environment): EntityManagerInterface
        {
            $isDevMode = 'prod' !== $environment;

            $prefixes = array_merge(
                DoctrinePrefixesSearcher::inPath(__DIR__.'/../../../../Pereira/','MN/Pereira')
            );

            $dbalCustomTypesClasses = DbalTypeSearcher::inPath(__DIR__ . '/../../../../Pereira', 'Pereira');

            return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
            );
        }
}