<?php

declare(strict_types=1);

namespace MN\Tests\Daniel\CoursesCounter\Domain;

use MN\Daniel\CoursesCounter\Domain\CoursesCounter;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterId;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterTotal;

final class CoursesCounterIncrementedDomainEventMother
{
    public static function create(
        CoursesCounterId $id,
        CoursesCounterTotal $total
    ): CoursesCounterIncrementedDomainEvent
    {
        return new CoursesCounterIncrementedDomainEvent($id->value(), $total->value());
    }

    public static function fromCounter(CoursesCounter $counter): CoursesCounterIncrementedDomainEvent
    {
        return self::create($counter->id(), $counter->total());
    }

    public static function random(): CoursesCounterIncrementedDomainEvent
    {
        return self::create(CoursesCounterIdMother::random(), CoursesCounterTotalMother::random());
    }
}