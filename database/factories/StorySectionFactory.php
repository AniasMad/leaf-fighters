<?php

namespace Database\Factories;

use App\Models\Story;
use App\Models\StorySection;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorySectionFactory extends Factory
{
    protected $model = StorySection::class;

    private $order = 1;

    public function definition()
    {
        $story = Story::inRandomOrder()->first();
        $numPage = $story->numPage;

        $order = $this->order++;
        if ($this->order > $numPage) {
            $this->order = 1;
        }

        return [
            'story_id' => $story->id,
            'text' => $this->faker->paragraph(4),
            'order' => $order
        ];
    }
}
