<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();


        $admin = new User;
        $admin->name = "administrator";
        $admin->email = "admin@email.com";
        $admin->password = "adminadmin";
        $admin->save();

        $admin->roles()->attach($role_admin);

        $user = new User;
        $user->name = "user";
        $user->email = "user@email.com";
        $user->password = "useruser";
        $user->save();

        $user->roles()->attach($role_user);
    }
}
