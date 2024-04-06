<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Story;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $story1 = new Story;
        $story1->title = "Leaf Fighters, Assemble!";
        $story1->description = "The start of the great adventure. When the world needed them most, they got together to save it.";
        $story1->numPage = '3';
        $story1->save();

        $story2 = new Story;
        $story2->title = "First Conflict";
        $story2->description = "How will our heroes handle the conflict of interest?"; 
        $story2->numPage = '2';
        $story2->save();


        $story3 = new Story;
        $story3->title = "Pixel's Hat";
        $story3->description = "What a tragedy! Pixel lost his hat in the winds.";
        $story3->numPage = '1';
        $story3->save();

        $story4 = new Story;
        $story4->title = "Poison Ivy";
        $story4->description = "Join Ivy's fight against the forces of destruction.";
        $story4->numPage = '3';
        $story4->save();

        $story5 = new Story;
        $story5->title = "Chip's Hermit Path";
        $story5->description = "Chip had to fight alone for ages. What will she choose when the world is in danger?";
        $story5->numPage = '2';
        $story5->save();
    }
}
