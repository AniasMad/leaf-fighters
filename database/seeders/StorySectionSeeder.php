<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\StorySection;
use Faker\Factory as FakerFactory;

class StorySectionSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create(); // Create Faker instance

        $stories = Story::all();

        foreach ($stories as $story) {
            $numPage = $story->numPage;

            for ($order = 1; $order <= $numPage; $order++) {
                StorySection::factory()->create([
                    'story_id' => $story->id,
                    'text' => $faker->sentence(4), // Use $faker to generate text
                    'order' => $order,
                ]);
            }
        }
    }
}
