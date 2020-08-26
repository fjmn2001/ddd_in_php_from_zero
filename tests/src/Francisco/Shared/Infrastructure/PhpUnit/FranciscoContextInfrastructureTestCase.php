<?php


declare(strict_types=1);


namespace MN\Tests\Francisco\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use MN\Apps\Francisco\Backend\FranciscoBackendKernel;
use MN\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;

abstract class FranciscoContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $arranger = new FranciscoEnvironmentArranger($this->service(EntityManager::class));
        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new FranciscoEnvironmentArranger($this->service(EntityManager::class));
        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return FranciscoBackendKernel::class;
    }
}