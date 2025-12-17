<?php

namespace Database\Factories\Media;

use Illuminate\Support\Str;
use App\Models\Media\FileCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    protected static int $imageIndex = 1;
    public function definition(): array
    {
        $imageNumber = self::$imageIndex++;
        $randomImages = collect(range(1, 200))
            ->shuffle()
            ->take(6)
            ->map(fn($num) => "/seeder/images/image_{$num}.jpg")
            ->values()
            ->toArray();
        return [
            'user_id' => 1,
            'file_category_id' => FileCategory::inRandomOrder()->first()->id,
            'slug' => Str::slug($this->faker->sentence(15)),
            'title' => $this->faker->sentence(15),
            'file' => "/seeder/images/image_{$imageNumber}.jpg",
            'attachment' => $randomImages,
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
