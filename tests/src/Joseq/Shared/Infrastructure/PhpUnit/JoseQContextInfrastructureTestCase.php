<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use MN\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;

class JoseQContextInfrastructureTestCase extends InfrastructureTestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $arranger = new JoseQEnvironmentArranger($this->service(EntityManager::class));
        $arranger->arrange();
    }

    protected function kernelClass(): string
    {
        // TODO: Implement kernelClass() method.
    }
}