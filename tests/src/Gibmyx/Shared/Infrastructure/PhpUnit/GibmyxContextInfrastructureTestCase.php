<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Shared\Infrastructure\PhpUnit;


use Doctrine\ORM\EntityManager;
use MN\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;

abstract class GibmyxContextInfrastructureTestCase extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $arranger = new GibmyxEnvironmentArranger($this->service(EntityManager::class));

        $arranger->arrange();
    }

    protected function kernelClass(): string
    {
        // TODO: Implement kernelClass() method.
    }
}