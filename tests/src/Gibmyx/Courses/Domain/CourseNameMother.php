<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\Courses\Domain;


use MN\Gibmyx\Courses\Domain\CourseName;
use MN\Tests\Shared\Domain\WordMother;

final class CourseNameMother
{
    public static function create(string $value): CourseName
    {
        return new CourseName($value);
    }

    public static function random(): CourseName
    {
        return self::create(WordMother::random());
    }
}