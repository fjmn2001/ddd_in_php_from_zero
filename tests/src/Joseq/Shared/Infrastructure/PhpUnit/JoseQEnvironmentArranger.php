<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use MN\Tests\Shared\Infrastructure\Doctrine\MySqlDatabaseCleaner;
use function Lambdish\Phunctional\apply;

final class JoseQEnvironmentArranger
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function arrange(): void
    {
        dd($this->entityManager);
        apply(new MySqlDatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {

    }
}