<?php


declare(strict_types=1);


namespace MN\Tests\Christian\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use MN\Apps\Christian\Backend\ChristianBackendKernel;
use MN\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;

abstract class ChristianContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $arranger = new ChristianEnvironmentArranger($this->service(EntityManager::class));
        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new ChristianEnvironmentArranger($this->service(EntityManager::class));
        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return ChristianBackendKernel::class;
    }
}