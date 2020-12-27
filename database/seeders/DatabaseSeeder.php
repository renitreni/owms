<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::query()->insert([
            'name'              => 'Administrator',
            'email'             => 'admin@tabang.com',
            'role'              => 1,
            'email_verified_at' => now(),
            'agency_code'       => Str::random(5),
            'password'          => 'tabangpass', // password
            'remember_token'    => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Employer::factory(100)->create();
        \App\Models\Employee::factory(1000)->create();
    }
}
