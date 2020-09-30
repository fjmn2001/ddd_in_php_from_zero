<?php

declare(strict_types=1);

namespace MN\Tests\Daniel\CoursesCounter\Application\Find;

use MN\Daniel\CoursesCounter\Application\Find\CoursesCounterFinder;
use MN\Daniel\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use MN\Daniel\CoursesCounter\Application\Find\FindCoursesCounterQueryHandler;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterNotExist;
use MN\Tests\Daniel\CoursesCounter\CoursesCounterModuleUnitTestCase;
use MN\Tests\Daniel\CoursesCounter\Domain\CoursesCounterMother;

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