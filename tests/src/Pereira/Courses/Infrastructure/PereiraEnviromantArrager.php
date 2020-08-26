<?php


namespace MN\Tests\Pereira\Courses\Infrastructure;


use Doctrine\ORM\EntityManager;
use const Lambdish\Phunctional\apply;

class PereiraEnviromantArrager
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager= $entityManager;
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseClear(), [this.$this->entityManager]);
    }

    public function close(): void
    {

    }
}