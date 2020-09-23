<?php

declare(strict_types=1);

namespace MN\Tests\Francisco\CoursesCounter\Domain;

use MN\Francisco\CoursesCounter\Domain\CoursesCounter;
use MN\Francisco\CoursesCounter\Domain\CoursesCounterId;
use MN\Francisco\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use MN\Francisco\CoursesCounter\Domain\CoursesCounterTotal;

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