<?php


namespace MN\Pereira\Courses\Infrastructure\Persistence;


use MN\Pereira\Courses\Domain\Course;
use MN\Pereira\Courses\Domain\CourseId;
use MN\Pereira\Courses\Domain\CourseRepository;


final class DoctrineCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course)
    {
        $this->persist();
    }
    public function search( CourseId $id):Course
    {
        return $this->repository(Course::class)->find($id);
    }
}