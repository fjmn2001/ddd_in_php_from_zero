<?php


namespace MN\Gibmyx\Courses\Domain;


interface CourseRepository
{
    public function save(Course $course): void;
    public function search(string $id): ?Course;
}
