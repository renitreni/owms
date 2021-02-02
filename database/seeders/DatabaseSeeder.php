<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agent;
use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Information;
use App\Models\OptionList;

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
            'email'             => 'admin@tabang.com',
            'role'              => 1,
            'email_verified_at' => now(),
            'password'          => bcrypt('tabangpass'), // password
            'remember_token'    => Str::random(10),
        ]);
        User::query()->insert([
            'email'             => 'agency@tabang.com',
            'role'              => 2,
            'email_verified_at' => now(),
            'password'          => bcrypt('tabangpass'), // password
            'remember_token'    => Str::random(10),
        ]);
        User::query()->insert([
            'email'             => 'employer@tabang.com',
            'role'              => 3,
            'email_verified_at' => now(),
            'password'          => bcrypt('tabangpass'), // password
            'remember_token'    => Str::random(10),
        ]);
        User::query()->insert([
            'email'             => 'gov@tabang.com',
            'role'              => 4,
            'email_verified_at' => now(),
            'password'          => bcrypt('tabangpass'), // password
            'remember_token'    => Str::random(10),
        ]);

        OptionList::query()->insert([
            ['type' => 'docs', 'name' => 'Passport'],
            ['type' => 'docs', 'name' => 'Biometrics'],
            ['type' => 'docs', 'name' => 'NBI Clearance'],
            ['type' => 'docs', 'name' => 'TESDA NC II'],
            ['type' => 'docs', 'name' => 'Medical'],
            ['type' => 'docs', 'name' => 'Enjaz'],
            ['type' => 'docs', 'name' => 'POEA'],
            ['type' => 'docs', 'name' => 'Diploma'],
            ['type' => 'docs', 'name' => 'Ticket for Travel'],
            ['type' => 'docs', 'name' => 'OEC'],
            ['type' => 'docs', 'name' => 'OWWA'],
            ['type' => 'docs', 'name' => 'PDOS'],
            ['type' => 'docs', 'name' => 'Visa Stamping'],
        ]);

        $hold = User::noInfoIds();
        foreach ($hold as $id) {
            Information::factory()->state(['user_id' => $id])->create();
        }
    }
}
