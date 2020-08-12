<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses\Domain;


use MN\JoseQ\Courses\Domain\CourseName;


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