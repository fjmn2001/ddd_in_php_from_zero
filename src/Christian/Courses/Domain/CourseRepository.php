<?php


declare(strict_types=1);


namespace MN\Christian\Courses\Domain;


interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}