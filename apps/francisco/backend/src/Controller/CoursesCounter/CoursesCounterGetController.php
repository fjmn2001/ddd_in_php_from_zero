<?php


namespace MN\Apps\Francisco\Backend\Controller\CoursesCounter;


use Symfony\Component\HttpFoundation\JsonResponse;

class CoursesCounterGetController
{
    public function __invoke()
    {
        //$response = $this->ask(new FindCoursesCounterQuery());

        return new JsonResponse([
            'total' => 1
        ]);
    }
}