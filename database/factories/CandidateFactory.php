<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker    = \Faker\Factory::create();
        $agentIds = User::getAgencyIds()->random();

        return [
            'photo_url'     => 'https://i.pravatar.cc/300',
            'agency_id'     => $agentIds,
            'applied_using' => $faker->randomElement(['online', 'walk-in', 'agent']),
            'code'          => $faker->hexColor,
            'iqama'         => $faker->creditCardNumber(),
            'first_name'    => $faker->firstName,
            'last_name'     => $faker->lastName,
            'middle_name'   => $faker->lastName,
            'email'         => $faker->email,
            'contact_1'     => $faker->phoneNumber,
            'contact_2'     => $faker->phoneNumber,
            'address'       => $faker->address,
            'birth_date'    => $faker->date(),
            'birth_place'   => $faker->address,
            'civil_status'  => $faker->randomElement(['single', 'married', 'widow']),
            'gender'        => $faker->randomElement(['male', 'female']),
            'position_1'    => $faker->jobTitle,
            'position_2'    => $faker->jobTitle,
            'position_3'    => $faker->jobTitle,
            'blood_type'    => 'O',
            'height'        => '5',
            'weight'        => '100',
            'religion'      => 'Jewish',
            'language'      => $faker->randomElement(['english', 'tagalog']),
            'passport'      => $faker->bankAccountNumber,
            'place_issue'   => $faker->address,
            'education'     => 'college',
            'spouse'        => $faker->name,
            'mother_name'   => $faker->name('female'),
            'father_name'   => $faker->name('male'),
            'status'        => 'applicant',
            'deployed'      => 'no',
            'agreed'        => 'yes',
        ];
    }
}
