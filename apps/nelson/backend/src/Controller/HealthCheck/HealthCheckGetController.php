<?php


declare(strict_types=1);


namespace MN\Apps\Nelson\Backend\Controller\HealthCheck;



use MN\Shared\Domain\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckGetController
{
    private $generator;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'nelson-backend' => 'ok',
            'rand' => $this->generator->generate()
        ]);
    }
}
