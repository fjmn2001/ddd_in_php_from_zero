<?php

declare(strict_types=1);


namespace MN\Apps\JoseQ\Backend\Controller\CoursesCounter;


use MN\JoseQ\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use MN\JoseQ\CoursesCounter\Domain\CoursesCounterNotExist;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use MN\Shared\Infrastructure\Symfony\ApiController;


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