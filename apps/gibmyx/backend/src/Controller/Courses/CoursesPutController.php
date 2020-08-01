<?php


declare(strict_types=1);


namespace MN\Apps\Gibmyx\Backend\Controller\Courses;


use MN\Shared\Domain\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController
{
    public function __invoke(string $id, Request $request): Response
    {
        return new Response('', Response::HTTP_CREATED);
    }
}