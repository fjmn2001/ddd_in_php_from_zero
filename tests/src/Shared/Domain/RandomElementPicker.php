<?php


declare(strict_types=1);


namespace MN\Tests\Shared\Domain;


final class RandomElementPicker
{
    public static function from(...$elements)
    {
        return MotherCreator::random()->randomElement($elements);
    }
}