<?php

namespace App\Course\Factory;

use App\DTO\Author;
use App\DTO\Category;
use App\DTO\Course;

class DefaultCourseFactory extends AbstractCourseFactory
{
    public function create(array $data): Course
    {
        return new Course(
            category: new Category($data['category']),
            name: $data['name'],
            description: $data['description'],
            synopsis: $data['synopsis'],
            price: $data['price'],
            author: new Author($data['author']),
        );
    }
}
