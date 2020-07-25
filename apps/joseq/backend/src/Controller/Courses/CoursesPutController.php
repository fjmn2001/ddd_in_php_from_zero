<?php


declare(strict_types=1);


namespace MN\Apps\JoseQ\Backend\Controller\Courses;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController
{

    public function __invoke(string $id, Request $request): Response
    {
        return new Response("", Response::HTTP_CREATED);
    }
}