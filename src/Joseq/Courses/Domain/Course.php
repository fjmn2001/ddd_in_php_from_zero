<?php
/**
 * Created by PhpStorm.
 * User: trabajo
 * Date: 01/08/20
 * Time: 11:21 AM
 */

namespace MN\Joseq\Courses\Domain;


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


}
