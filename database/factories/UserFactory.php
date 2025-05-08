<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    protected $faker = null;
    protected $password = null;

    public function definition(): array
    {
        if ($this->faker === null) {
            $this->faker = \Faker\Factory::create();
            $this->faker->seed(1234); // Fixed seed for consistency
        }

        $name = $this->faker->name();
        // Generate email based on the name for consistency
        $email = Str::slug($name) . '@' . $this->faker->safeEmailDomain();

        return [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => $this->password ??= Hash::make('ZaimSCM@123'), // Default password
            'remember_token' => Str::random(10),
            'access_level' => 3, // Default to student access level
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

    /**
     * Set the user as a student.
     */
    public function student(): static
    {
        return $this->state(fn (array $attributes) => [
            'access_level' => 7,
        ]);
    }

    /**
     * Set the user as a lecturer.
     */
    public function lecturer(): static
    {
        return $this->state(fn (array $attributes) => [
            'access_level' => 3,
        ]);
    }
}
