<?php

namespace Database\Seeders;

use App\Models\OptionList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_lists')->truncate();

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
            ['type' => 'docs', 'name' => 'Employment Contract'],
        ]);
    }
}
