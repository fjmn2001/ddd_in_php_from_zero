<?php

declare(strict_types=1);

namespace MN\Tests\Gabriel\CoursesCounter\Domain;

use MN\Gabriel\CoursesCounter\Domain\CoursesCounter;
use MN\Gabriel\CoursesCounter\Domain\CoursesCounterId;
use MN\Gabriel\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use MN\Gabriel\CoursesCounter\Domain\CoursesCounterTotal;

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