<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quest;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quest1 = new Quest;
        $quest1->title = "Fresh Air!";
        $quest1->description = "Walk outside for 10 minutes.";
        $quest1->type = "Free";
        $quest1->reward = '5';
        $quest1->save();

        $quest2 = new Quest;
        $quest2->title = "Nice and Warm";
        $quest2->description = "Get chocolate milk at Sponsored Location with reusable cup."; 
        $quest2->type = "Sponsored";
        $quest2->reward = '2';
        $quest2->save();


        $quest3 = new Quest;
        $quest3->title = "New life, new leaf";
        $quest3->description = "Plant a flower.";
        $quest3->type = "Free";
        $quest3->reward = '10';
        $quest3->save();
    }
}
