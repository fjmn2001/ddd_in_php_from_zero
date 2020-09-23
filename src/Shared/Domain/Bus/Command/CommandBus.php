<?php

declare(strict_types=1);

namespace MN\Shared\Domain\Bus\Command;

interface CommandBus
{
    public function dispatch(Command $command): void;
}