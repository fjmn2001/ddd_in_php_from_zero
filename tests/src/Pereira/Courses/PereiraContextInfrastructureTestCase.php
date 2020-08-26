<?php


namespace MN\Tests\Pereira\Courses;


use Doctrine\ORM\EntityManager;
use MN\Tests\Pereira\Courses\Infrastructure\PereiraEnviromantArrager;

class PereiraContextInfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $arranger = new PereiraEnviromantArrager($this.service(EntityManager::class));
        $arranger->arrange();
    }

    protected function kernelClass(): string
    {

    }
}