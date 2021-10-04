<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Support\Enum\UserStatus;
use Illuminate\Support\Facades\App;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'hash' => sha1($this->faker->email),
            'password' => bcrypt(Str::random(10)),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'avatar' => null,
            'address' => $this->faker->address,
            'country_id' => function () {
                return $this->faker->randomElement(Country::pluck('id')->toArray());
            },
            'role_id' => function () {
                return \App\Models\Role::factory()->create()->id;
            },
            'status' => UserStatus::ACTIVE,
            'birthday' => $this->faker->date()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
