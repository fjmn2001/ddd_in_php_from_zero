<?php


namespace MN\Tests\Nelson\Courses\Domain;


use MN\Francisco\Courses\Domain\Course;
use MN\Francisco\Courses\Domain\CourseId;
use MN\Francisco\Courses\Domain\CourseName;
use MN\JoseQ\Courses\Domain\CourseDuration;

final class CourseMother
{
    public static  function  create(CourseId $id, CourseName $name,CourseDuration $duration):Course
    {
return new Course($id, $name, $duration);
    }

    public function Random() :Course

}
