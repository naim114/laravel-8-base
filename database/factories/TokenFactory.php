<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TokenFactory extends Factory
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
            'id' => Str::random(5),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'ip_address' => $this->faker->ipv4,
            'user_agent' => substr($this->faker->userAgent, 0, 500),
            'expires_at' => \Carbon\Carbon::now()->addMinutes(60)
        ];
    }
}
