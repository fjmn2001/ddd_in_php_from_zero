<?php

declare(strict_types=1);

namespace MN\Shared\Infrastructure\Bus\Event;

use Throwable;

final class DomainEventClassNotExist extends \RuntimeException
{
    public function __construct(string $name)
    {
        parent::__construct("The Domain Event Class for <$name> doesn't exists or have no subscribers");
    }
}