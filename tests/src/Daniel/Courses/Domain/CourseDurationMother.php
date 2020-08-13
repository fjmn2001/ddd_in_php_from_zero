<?php

declare(strict_types=1);


namespace MN\Tests\Daniel\Courses\Domain;


use MN\Daniel\Courses\Domain\CourseDuration;
use MN\Tests\Shared\Domain\IntegerMother;
use MN\Tests\Shared\Domain\RandomElementPicker;

final class CourseDurationMother
{
    public static function create(string $value): CourseDuration
    {
        return new CourseDuration($value);
    }

    public static function random(): CourseDuration
    {
        return self::create(
            sprintf(
                '%s %s',
                IntegerMother::lessThan(100),
                RandomElementPicker::from('month', 'years', 'days', 'hours', 'minutes', 'secods')
            )
        );
    }
}