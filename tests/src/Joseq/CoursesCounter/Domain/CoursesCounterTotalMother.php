<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\CoursesCounter\Domain;

use MN\JoseQ\CoursesCounter\Domain\CoursesCounterTotal;
use MN\Tests\Shared\Domain\IntegerMother;
final class CoursesCounterTotalMother
{
    public static function create(int $value): CoursesCounterTotal
    {
        return new CoursesCounterTotal($value);
    }

    public static function one(): CoursesCounterTotal
    {
        return self::create(1);
    }

    public static function random(): CoursesCounterTotal
    {
        return self::create(IntegerMother::random());
    }
}