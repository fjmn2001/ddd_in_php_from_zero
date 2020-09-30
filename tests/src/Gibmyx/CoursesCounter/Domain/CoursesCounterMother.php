<?php

declare(strict_types=1);


namespace MN\Tests\Gibmyx\CoursesCounter\Domain;

use MN\Gibmyx\Courses\Domain\CourseId;
use MN\Gibmyx\CoursesCounter\Domain\CoursesCounter;
use MN\Gibmyx\CoursesCounter\Domain\CoursesCounterId;
use MN\Gibmyx\CoursesCounter\Domain\CoursesCounterTotal;
use MN\Tests\Gibmyx\Courses\Domain\CourseIdMother;
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