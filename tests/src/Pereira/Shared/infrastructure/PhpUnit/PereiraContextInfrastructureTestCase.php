<?php


declare(strict_types=1);


namespace MN\Tests\Pereira\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use MN\Apps\Pereira\Backend\PereiraBackendKernel;
use MN\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;

abstract class PereiraContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $arranger = new PereiraEnvironmentArranger($this->service(EntityManager::class));
        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new PereiraEnvironmentArranger($this->service(EntityManager::class));
        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return PereiraBackendKernel::class;
    }
}