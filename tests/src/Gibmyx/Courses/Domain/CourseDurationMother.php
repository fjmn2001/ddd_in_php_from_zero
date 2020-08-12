<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Domain;


use MN\Gibmyx\Courses\Domain\CourseDuration;

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
                RandomElementPicker::form('months', 'years', 'days', 'hours', 'minutes', 'secunds')
            )
        );
    }
}