<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use MN\Apps\JoseQ\Backend\JoseQBackendKernel;
use MN\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;

class JoseQContextInfrastructureTestCase extends InfrastructureTestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $arranger = new JoseQEnvironmentArranger($this->service(EntityManager::class));
        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new JoseQEnvironmentArranger($this->service(EntityManager::class));
        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return JoseQBackendKernel::class;
    }
}