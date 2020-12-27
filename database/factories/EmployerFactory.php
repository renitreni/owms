<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class EmployerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $user = User::all()->random();

        return [
            'agency_code' => $user->agency_code,
            'name' => $faker->company,
            'tin' => $faker->bankAccountNumber,
            'address_line_1' => $faker->address,
            'address_line_2' => $faker->address,
            'city' => $faker->city,
            'zip_code' => $faker->postcode,
            'contact_name' => $faker->name,
            'phone' => $faker->phoneNumber,
            'fax' => $faker->phoneNumber,
            'email' => $faker->companyEmail,
            'status'=> 'active',
            'type' => null,
            'created_by' => $user->id,
        ];
    }
}
