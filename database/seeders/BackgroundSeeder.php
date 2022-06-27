<?php

namespace Database\Seeders;

use App\Enums\BackgroundType;
use App\Models\Background;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backgrounds = [
            //Images
            [
                'type' => BackgroundType::IMAGE,
                'path' => 'main.jpg',
                'color' => null
            ],
            [
                'type' => BackgroundType::IMAGE,
                'path' => 'main.jpg',
                'color' => null
            ],
            [
                'type' => BackgroundType::IMAGE,
                'path' => 'main.jpg',
                'color' => null
            ],
            [
                'type' => BackgroundType::IMAGE,
                'path' => 'main.jpg',
                'color' => null
            ],

            // Colors

            [
                'type' => BackgroundType::COLOR,
                'path' => null,
                'color' => 'rgb(0, 121, 191)'
            ],
            [
                'type' => BackgroundType::COLOR,
                'path' => null,
                'color' => 'rgb(210, 144, 52)'
            ],
            [
                'type' => BackgroundType::COLOR,
                'path' => null,
                'color' => 'rgb(81, 152, 57)'
            ],
            [
                'type' => BackgroundType::COLOR,
                'path' => null,
                'color' => 'rgb(176, 70, 50)'
            ],
            [
                'type' => BackgroundType::COLOR,
                'path' => null,
                'color' => 'rgb(137, 96, 158)'
            ],
            [
                'type' => BackgroundType::COLOR,
                'path' => null,
                'color' => 'rgb(205, 90, 145)'
            ],
        ];

        Background::query()->insert($backgrounds);
    }
}
