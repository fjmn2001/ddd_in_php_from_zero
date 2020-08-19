<?php

declare(strict_types=1);

namespace MN\Christian\Courses\Infrastructure\Persistence;

use MN\Christian\Courses\Domain\Course;
use MN\Christian\Courses\Domain\CourseId;
use MN\Christian\Courses\Domain\CourseRepository;

final class DoctrineCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}
