<?php

declare(strict_types=1);


namespace MN\Gabriel\Courses\Infrastructure\Persistence;


use MN\Gabriel\Courses\Domain\Course;
use MN\Gabriel\Courses\Domain\CourseId;
use MN\Gabriel\Courses\Domain\CourseRepository;
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