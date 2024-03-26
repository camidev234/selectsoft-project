<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $roleCounter = 0;
    public function definition(): array
    {
        $this->roleCounter++;

        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'document_type_id' => 1,
            'number_document' => $this->faker->unique()->numerify('##########'),
            'telephone' => $this->faker->phoneNumber,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'country_id' => 1,
            'departament_id' => 1,
            'city_id' => 1,
            'birthdate' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'role_id' => ceil($this->roleCounter / 10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
