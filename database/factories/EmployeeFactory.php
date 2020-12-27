<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $user  = User::all()->random();

        return [
            'photo_url'    => 'https://i.pravatar.cc/300',
            'agency_code'  => $user->agency_code,
            'first_name'   => $faker->firstName,
            'last_name'    => $faker->lastName,
            'middle_name'  => $faker->lastName,
            'email'        => $faker->email,
            'contact_1'    => $faker->phoneNumber,
            'contact_2'    => $faker->phoneNumber,
            'address'      => $faker->address,
            'birth_date'   => $faker->date(),
            'sex'          => $faker->randomElement(['male', 'female']),
            'civil_status' => $faker->randomElement(['single', 'married', 'widow']),
            'passport'     => $faker->bankAccountNumber,
            'education'    => 'college',
            'spouse'       => $faker->name,
            'mother_name'  => $faker->name('female'),
        ];
    }
}
