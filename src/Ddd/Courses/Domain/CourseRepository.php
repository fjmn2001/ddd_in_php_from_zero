<?php


namespace MN\Ddd\Courses\Domain;




interface CourseRepository
{
    public function save(Course $course): void;
}