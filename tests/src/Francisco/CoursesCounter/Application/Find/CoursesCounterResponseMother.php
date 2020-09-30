<?php

declare(strict_types=1);

namespace MN\Tests\Francisco\CoursesCounter\Application\Find;

use MN\Francisco\CoursesCounter\Application\Find\CoursesCounterResponse;
use MN\Francisco\CoursesCounter\Domain\CoursesCounterTotal;
use MN\Tests\Francisco\CoursesCounter\Domain\CoursesCounterTotalMother;

final class CoursesCounterResponseMother
{
    public static function create(CoursesCounterTotal $total): CoursesCounterResponse
    {
        return new CoursesCounterResponse($total->value());
    }

    public static function random(): CoursesCounterResponse
    {
        return self::create(CoursesCounterTotalMother::random());
    }
}