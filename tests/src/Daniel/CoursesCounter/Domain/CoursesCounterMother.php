<?php

declare(strict_types=1);

namespace MN\Tests\Daniel\CoursesCounter\Domain;

use MN\Daniel\Courses\Domain\CourseId;
use MN\Daniel\CoursesCounter\Domain\CoursesCounter;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterId;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterTotal;
use MN\Tests\Daniel\Courses\Domain\CourseIdMother;
use MN\Tests\Shared\Domain\Repeater;

final class CoursesCounterMother
{
    public static function create(
        CoursesCounterId $id,
        CoursesCounterTotal $total,
        CourseId ...$existingCourses
    ): CoursesCounter
    {
        return new CoursesCounter($id, $total, ...$existingCourses);
    }

    public static function withOne(CourseId $courseId): CoursesCounter
    {
        return self::create(CoursesCounterIdMother::random(), CoursesCounterTotalMother::one(), $courseId);
    }

    public static function incrementing(CoursesCounter $existingCounter, CourseId $courseId): CoursesCounter
    {
        return self::create(
            $existingCounter->id(),
            CoursesCounterTotalMother::create($existingCounter->total()->value() + 1),
            ...array_merge($existingCounter->existingCourses(), [$courseId])
        );
    }

    public static function random(): CoursesCounter
    {
        return self::create(
            CoursesCounterIdMother::random(),
            CoursesCounterTotalMother::random(),
            ...Repeater::random(CourseIdMother::creator())
        );
    }
}