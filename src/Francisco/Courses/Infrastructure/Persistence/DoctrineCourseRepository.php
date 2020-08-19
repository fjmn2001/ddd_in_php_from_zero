<?php


declare(strict_types=1);


namespace MN\Francisco\Courses\Infrastructure\Persistence;


use MN\Francisco\Courses\Domain\Course;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseRepository;
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