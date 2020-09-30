<?php

declare(strict_types=1);

namespace MN\Tests\Francisco\CoursesCounter\Application\Find;

use MN\Francisco\CoursesCounter\Application\Find\CoursesCounterFinder;
use MN\Francisco\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use MN\Francisco\CoursesCounter\Application\Find\FindCoursesCounterQueryHandler;
use MN\Francisco\CoursesCounter\Domain\CoursesCounterNotExist;
use MN\Tests\Francisco\CoursesCounter\CoursesCounterModuleUnitTestCase;
use MN\Tests\Francisco\CoursesCounter\Domain\CoursesCounterMother;

final class FindCoursesCounterQueryHandlerTest extends CoursesCounterModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindCoursesCounterQueryHandler(new CoursesCounterFinder($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_find_an_existing_courses_counter(): void
    {
        $counter = CoursesCounterMother::random();
        $query = new FindCoursesCounterQuery();
        $response = CoursesCounterResponseMother::create($counter->total());

        $this->shouldSearch($counter);

        $this->assertAskResponse($response, $query, $this->handler);
    }

    /** @test */
    public function it_should_throw_an_exception_when_courses_counter_does_not_exists(): void
    {
        $query = new FindCoursesCounterQuery();

        $this->shouldSearch(null);

        $this->assertAskThrowsException(CoursesCounterNotExist::class, $query, $this->handler);
    }
}