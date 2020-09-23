<?php

declare(strict_types=1);

namespace MN\Shared\Infrastructure\Bus\Command;

final class CommandNotRegisteredError extends \RuntimeException
{
    public function __construct(\MN\Shared\Domain\Bus\Command\Command $command)
    {
        $commandClass = get_class($command);

        parent::__construct("The command <$commandClass> hasn't a command handler associated");
    }
}