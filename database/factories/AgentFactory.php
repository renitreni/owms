<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $agentIds = User::getAgentIds()->random();

        return [
            'agency_id'  => $agentIds,
            'name'       => $this->faker->name,
            'contact_no' => $this->faker->phoneNumber,
            'email'      => $this->faker->safeEmail,
            'address'    => $this->faker->address,
            'status'     => 'active',
        ];
    }
}
