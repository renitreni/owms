<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agent;
use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Information;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(200)->create();

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

        $hold = User::noInfoIds();
        foreach ($hold as $id) {
            Information::factory()->state(['user_id' => $id])->create();
        }

        Candidate::factory(800)->create();
        Agent::factory(800)->create();

        $employers = User::getEmployersIds();
        foreach ($employers as $key => $id) {
            $user = User::find($id);
            $user->agency_id = 202;
            $user->save();
        }
    }
}
