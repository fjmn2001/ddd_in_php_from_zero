<?php


namespace MN\Apps\Francisco\Backend\Controller\CoursesCounter;


use MN\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CoursesCounterGetController extends ApiController
{
    public function __invoke()
    {
        //$response = $this->ask(new FindCoursesCounterQuery());

        return new JsonResponse([
            'total' => 1
        ]);
    }
}