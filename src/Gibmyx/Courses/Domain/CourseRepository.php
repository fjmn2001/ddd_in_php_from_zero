<?php


namespace MN\Gibmyx\Courses\Domain;


interface CourseRepository
{
    public function save(Course $course): void;
}
