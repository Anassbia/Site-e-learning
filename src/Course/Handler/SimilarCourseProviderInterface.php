<?php

namespace App\Course\Handler;

use App\DTO\Course;

interface SimilarCourseProviderInterface
{
    public function getSimilarCourses(Course $course, int $limit): array;
}
