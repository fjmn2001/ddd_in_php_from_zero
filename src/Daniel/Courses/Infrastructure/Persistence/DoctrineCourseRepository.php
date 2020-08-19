<?php

declare(strict_types=1);


namespace MN\Daniel\Courses\Infrastructure\Persistence;


use MN\Daniel\Courses\Domain\Course;
use MN\Daniel\Courses\Domain\CourseId;
use MN\Daniel\Courses\Domain\CourseRepository;

final class DoctrineCourseRepository implements CourseRepository
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