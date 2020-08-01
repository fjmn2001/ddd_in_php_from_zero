<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 01/08/20
 * Time: 11:21 AM
 */

namespace MN\JoseQ\Courses\Domain;


class Course
{

    private $id;
    private $name;
    private $duration;


    public function __construct(string $id, string $name, string $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;

    }

    public function Id(): string
    {
        return $this->id;
    }

    public function Name(): string
    {
        return $this->name;
    }

    public function Duration(): string
    {
        return $this->duration;
    }
}
