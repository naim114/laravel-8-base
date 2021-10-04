<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'description' => substr($this->faker->paragraph, 0, 255),
            'ip_address' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent
        ];
    }
}
