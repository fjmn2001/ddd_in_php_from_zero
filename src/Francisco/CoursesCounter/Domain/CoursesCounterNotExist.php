<?php

declare(strict_types=1);

namespace MN\Francisco\CoursesCounter\Domain;

final class CoursesCounterNotExist extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('The courses counter not exist');
    }
}