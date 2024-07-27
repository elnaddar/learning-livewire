<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "name"=> "admin",
            "email"=> "admin@admin.com",
            "password"=> bcrypt("1234"),
        ]);
        $user->assignRole("super-admin");

        $user = User::create([
            "name"=> "reader",
            "email"=> "reader@reader.com",
            "password"=> bcrypt("1234"),
        ]);
        $user->assignRole("user-reader");
    }
}
