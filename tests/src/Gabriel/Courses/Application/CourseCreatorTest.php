<?php


declare(strict_types=1);


namespace MN\Tests\Gabriel\Courses\Application;


use MN\Gabriel\Courses\Application\CourseCreator;
use MN\Gabriel\Courses\Application\CreateCourseRequest;
use MN\Gabriel\Courses\Domain\CourseRepository;
use MN\Gabriel\Courses\Domain\Course;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /**
     * @test
     * */
  public function it_should_create_a_valid_course():void
  {
        $respository = $this->createMock(CourseRepository::class);

        $creator = new CourseCreator($respository);

        $id = 'some-id';
        $name = 'some-name';
        $duration = 'some-duration';

        $course = new Course($id,$name,$duration);

        $respository->method('save')->with($course);

        $creator->__invoke(new CreateCourseRequest($id,$name,$duration));
  }
}