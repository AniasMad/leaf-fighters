<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserQuestSeeder extends Seeder
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
    }
}
