<?php

declare(strict_types=1);

namespace MN\Gabriel\CoursesCounter\Application\Find;

use MN\Shared\Domain\Bus\Query\Response;

final class CoursesCounterResponse implements Response
{
    private $total;

    public function __construct(int $total)
    {
        $this->total = $total;
    }

    public function total(): int
    {
        return $this->total;
    }
}