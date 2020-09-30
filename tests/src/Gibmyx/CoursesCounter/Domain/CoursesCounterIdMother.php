<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\CoursesCounter\Domain;


use MN\Gibmyx\CoursesCounter\Domain\CoursesCounterId;
use MN\Tests\Shared\Domain\UuidMother;
final class CoursesCounterIdMother
{
    public static function create(string $value): CoursesCounterId
    {
        return new CoursesCounterId($value);
    }

    public static function random(): CoursesCounterId
    {
        return self::create(UuidMother::random());
    }
}