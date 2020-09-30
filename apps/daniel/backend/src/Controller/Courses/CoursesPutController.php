<?php


declare(strict_types=1);


namespace MN\Apps\Daniel\Backend\Controller\Courses;



use MN\Daniel\Courses\Application\CreateCourseCommand;
use MN\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController extends ApiController
{
    public function __invoke(string $id, Request $request): Response
    {
        $name = $request->get('name');
        $duration = $request->get('duration');


        $this->dispatch(
            new CreateCourseCommand($id, $name, $duration)
        );

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}