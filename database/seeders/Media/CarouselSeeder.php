<?php

namespace Database\Seeders\Media;

use App\Models\Media\Carousel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarouselSeeder extends Seeder
{
    public function run(): void
    {
        // Carousel::factory()->count(20)->create();
        $data = [
            [
                'title' => 'The clean stack for Artisans and agents.',
                'description' => 'Laravel is batteries-included so everyone can build and ship web apps at ridiculous speed.',
                'file' => "seeder/carousel/laravel.png",
            ],
            [
                'title' => 'Build apps & admin panels fast, for your bright ideas.',
                'description' => 'With a solid Laravel foundation and a polished UI, you can focus on what makes your product unique.',
                'file' => "seeder/carousel/filamentphp.jpeg",
            ],
            [
                'title' => 'A popular general-purpose scripting language that is especially suited to web development.',
                'description' => 'Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.',
                'file' => "seeder/carousel/php.png",
            ],
            [
                'title' => 'Rapidly build modern websites without ever leaving your HTML.',
                'description' => 'A utility-first CSS framework packed with classes like flex, pt-4, text-center and rotate-90 that can be composed to build any design, directly in your markup.',
                'file' => "seeder/carousel/tailwindcss.webp",
            ],
        ];
        foreach ($data as $item) :
            Carousel::create(
                [
                    'is_show' => true,
                    'user_id' => 1,
                    'slug' => Str::slug($item['title']),
                    'title' => Str::headline(Str::lower($item['title'])),
                    'description' => Str::headline(Str::lower($item['description'])),
                    'file' => $item['file'],
                ],
            );
        endforeach;
    }
}
