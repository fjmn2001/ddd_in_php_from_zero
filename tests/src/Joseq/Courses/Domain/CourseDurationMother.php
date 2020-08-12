<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses\Domain;


use MN\JoseQ\Courses\Domain\CourseDuration;
use MN\Tests\Shared\Domain\IntegerMother;
use MN\Tests\Shared\Domain\RandomElementPicker;

final class CourseDurationMother
{
    public static function create(string $value): CourseDuration
    {
        return new CourseDuration($value);
    }

    public static function random()
    {
        return self::create(
            sprintf(
                '%s %s',
                IntegerMother::lessThan(100),
                RandomElementPicker::from('months', 'years','days','hours','minutes','seconds')
            )
        );
    }
}