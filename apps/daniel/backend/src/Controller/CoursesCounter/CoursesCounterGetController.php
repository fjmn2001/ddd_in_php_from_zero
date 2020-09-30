<?php


namespace MN\Apps\Daniel\Backend\Controller\CoursesCounter;


use MN\Daniel\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use MN\Daniel\CoursesCounter\Domain\CoursesCounterNotExist;
use MN\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CoursesCounterGetController extends ApiController
{
    public function __invoke()
    {
        $response = $this->ask(new FindCoursesCounterQuery());

        return new JsonResponse([
            'total' => $response->total()
        ]);
    }

    protected function exceptions(): array
    {
        return [
            CoursesCounterNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }
}