<?php


declare(strict_types=1);


namespace MN\Gibmyx\Courses\Infrastructure\Persistence;


use MN\Gibmyx\Courses\Domain\Course;
use MN\Gibmyx\Courses\Domain\CourseId;
use MN\Gibmyx\Courses\Domain\CourseRepository;
use MN\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

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
