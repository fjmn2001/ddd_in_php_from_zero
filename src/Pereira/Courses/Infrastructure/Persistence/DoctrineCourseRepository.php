<?php


namespace MN\Pereira\Courses\Infrastructure\Persistence;


use MN\Pereira\Courses\Domain\Course;
use MN\Pereira\Courses\Domain\CourseId;
use MN\Pereira\Courses\Domain\CourseRepository;
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