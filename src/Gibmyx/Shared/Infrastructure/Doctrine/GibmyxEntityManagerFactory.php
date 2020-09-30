<?php

declare(strict_types=1);


namespace MN\Gibmyx\Shared\Infrastructure\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use MN\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

final class GibmyxEntityManagerFactory
{
    private const SHEMA_PATH = __DIR__ . "/../../../../../databases/gibmyx.sql";

    public static function create(array $parameters, string $enveronment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $enveronment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Gibmyx', 'MN\Gibmyx')
        );

        $dbalCustomTypesClasses = DbalTypeSearcher::inPath(__DIR__ . '/../../../../Gibmyx', 'Gibmyx');

        return DoctrineEntityManagerFactory::create(
          $parameters,
          $prefixes,
          $isDevMode,
          self::SHEMA_PATH,
          $dbalCustomTypesClasses
        );
    }
}