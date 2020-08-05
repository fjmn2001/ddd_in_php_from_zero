<?php


declare(strict_types=1);


namespace MN\Apps\Nelson\Backend\Controller\Courses;


use MN\Nelson\Courses\Application\CourseCreator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController
{
    public function __construct(CourseCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(string $id, Request $request): Response
    {
        $name       = $request->get('name');
        $duration   = $request->get('duration');

        $this->creator->__invoke($id, $name, $duration);

        return new Response('', Response::HTTP_CREATED);
    }
}
