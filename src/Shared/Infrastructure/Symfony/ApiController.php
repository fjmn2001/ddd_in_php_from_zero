<?php

declare(strict_types=1);

namespace MN\Shared\Infrastructure\Symfony;

use MN\Shared\Domain\Bus\Query\Query;
use MN\Shared\Domain\Bus\Query\QueryBus;
use MN\Shared\Domain\Bus\Query\Response;
use function Lambdish\Phunctional\each;

abstract class ApiController
{
    private $queryBus;
    private $commandBus;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    )
    {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;

        each(
            function (int $httpCode, string $exceptionClass) use ($exceptionHandler) {
                $exceptionHandler->register($exceptionClass, $httpCode);
            },
            $this->exceptions()
        );
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}