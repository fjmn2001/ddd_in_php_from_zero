<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Domain;


use MN\Gibmyx\Courses\Domain\CourseId;

final class CourseIdMother
{

    public static function create(string $value): CourseId
    {
        return new CourseId($value);
    }

    public static function creator(): callable
    {
        return static function () {
          return self::random();
        };
    }

    public static function random(): CourseId
    {
        return self::create(UuidMother::random());
    }
}