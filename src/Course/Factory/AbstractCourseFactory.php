<?php

namespace App\Course\Factory;

use App\DTO\Course;

abstract class AbstractCourseFactory
{
    abstract public function create(array $data): Course;
}
