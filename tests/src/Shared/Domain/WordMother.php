<?php


declare(strict_types=1);


namespace MN\Tests\Shared\Domain;


final class WordMother
{
    public static function random(): string
    {
        return MotherCreator::random()->word;
    }
}