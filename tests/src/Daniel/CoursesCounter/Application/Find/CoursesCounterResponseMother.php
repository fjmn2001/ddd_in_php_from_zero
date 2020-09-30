<?php

declare(strict_types=1);

namespace MN\Tests\Daniel\CoursesCounter\Application\Find;

use MN\Daniel\CoursesCounter\Application\Find\CoursesCounterResponse;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterTotal;
use MN\Tests\Daniel\CoursesCounter\Domain\CoursesCounterTotalMother;

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