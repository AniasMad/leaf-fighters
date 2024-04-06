<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Quest;

class AssignQuests extends Command
{
    protected $signature = 'quest:assign';

    protected $description = 'Assign a random quest daily to all users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $randomQuest = Quest::inRandomOrder()->first();

        if (!$randomQuest) {
            $this->error('No quests available.');
            return;
        }

        $users = User::all();

        foreach ($users as $user) {
            $user->quests()->syncWithoutDetaching([$randomQuest->id]);
        }

        $this->info("Assigned quest '{$randomQuest->title}' to all users.");
    }
}
