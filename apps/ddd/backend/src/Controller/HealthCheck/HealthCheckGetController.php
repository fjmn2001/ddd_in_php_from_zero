<?php


declare(strict_types=1);


namespace MN\Apps\Ddd\Backend\Controller\HealthCheck;


use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckGetController
{
    public function __invoke()
    {
        return new JsonResponse([
            'status' => 'ok'
        ]);
    }
}