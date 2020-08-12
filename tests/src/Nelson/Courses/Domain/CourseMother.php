<?php


namespace MN\Tests\Nelson\Courses\Domain;


use MN\Nelson\Courses\Domain\Course;
use MN\Nelson\Courses\Domain\CourseId;
use MN\Nelson\Courses\Domain\CourseName;
use MN\Nelson\Courses\Domain\CourseDuration;

final class CourseMother
{
    public static  function  create(CourseId $id, CourseName $name,CourseDuration $duration):Course
    {
return new Course($id, $name, $duration);
    }

    public function Random() :Course

}
