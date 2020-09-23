<?php

declare(strict_types=1);

namespace MN\Shared\Infrastructure\Bus\Query;

final class QueryNotRegisteredError extends \RuntimeException
{
    public function __construct(\MN\Shared\Domain\Bus\Query\Query $query)
    {
        $queryClass = get_class($query);

        parent::__construct("The query <$queryClass> hasn't a query handler associated");
    }
}