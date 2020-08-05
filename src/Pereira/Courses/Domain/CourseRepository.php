<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 01/08/20
 * Time: 10:49 AM
 */

namespace MN\Pereira\Courses\Domain;


interface CourseRepository
{
    public function save(Course $course): void;

    public function search(string $id): ?Course;


}