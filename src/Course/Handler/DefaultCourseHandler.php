<?php

namespace App\Course\Handler;

use App\Course\Factory\DefaultCourseFactory;
use App\DTO\Course;

class DefaultCourseHandler
{
    public function __construct(
        private readonly DefaultCourseFactory $factory,
    ) {

    }


    public function fetchAllCourses(): array
    {
        return [
            'introduction-a-la-programmation' => $this->factory->create([
               'name' => 'Introduction à la programmation',
               'price' => 49.99,
               'synopsis' => 'Apprenez les bases de la programmation avec Python.',
               'description' => 'Ce cours couvre les fondamentaux de la programmation, y compris les variables, les boucles, les fonctions et les structures de données.',
               'author' => 'Alice Dupont',
               'category' => 'Informatique',
            ]),
            'analyse-financiere' => $this->factory->create([
                'name' => 'Analyse financière',
                'price' => 79.00,
                'synopsis' => 'Comprendre les états financiers et les indicateurs clés.',
                'description' =>'Ce cours vous guide à travers l’analyse des bilans, des comptes de résultat et des flux de trésorerie.',
                'author' => 'Jean Martin',
                'category' => 'Finance',
            ]),
            'photographie-numerique' => $this->factory->create([
                'name' => 'Photographie numérique',
                'price' => 59.50,
                'synopsis' => 'Maîtrisez votre appareil photo et composez des images percutantes.',
                'description' => 'Apprenez les techniques de prise de vue, de composition, et de retouche photo avec des outils professionnels.',
                'author' => 'Sophie Bernard',
                'category' => 'Arts visuels',
            ])
        ];
    }

    public function getCourseBySlug(string $slug): Course|null
    {
        $course = $this->fetchAllCourses();

        return $course[$slug] ?? null;
    }

       public function findSimilarCourses(int $limit): array
    {
        $courses = $this->fetchAllCourses();

        $keys = \array_flip(\array_rand($courses, $limit));

        return \array_intersect_ukey($courses, $keys, function (string $a, $b) {
            return $a <=> $b;
        });
    }

     public function getSimilarCourses(Course $course, int $limit): array
    {
        $courses = $this->fetchAllCourses();

        $keys = \array_flip(\array_rand($courses, $limit));

        return \array_intersect_ukey($courses, $keys, function (string $a, $b) {
            return $a <=> $b;
        });
    }
}
