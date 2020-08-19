<?php

declare(strict_types=1);


namespace MN\Tests\Joseq\Courses\Infrastructure\Persistence;


use MN\JoseQ\Courses\Domain\Course;
use MN\JoseQ\Courses\Domain\CourseId;
use MN\JoseQ\Courses\Domain\CourseRepository;

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