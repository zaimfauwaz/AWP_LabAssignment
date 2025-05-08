<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    protected $model = Lecturer::class;
    protected $faker = null;

    public function definition(): array
    {
        if ($this->faker === null) {
            $this->faker = \Faker\Factory::create();
            $this->faker->seed(1234);
        }

        $name = $this->faker->name();
        // Remove salutations and ensure we have a valid username
        $cleanName = trim(str_replace(['Dr.', 'Dr', 'Mr.', 'Mr', 'Mrs.', 'Mrs', 'Ms.', 'Ms', 'Prof.', 'Prof'], '', $name));
        $nameParts = array_filter(explode(' ', $cleanName)); // Remove empty elements
        $username = strtolower($nameParts[0] ?? 'user' . $this->faker->unique()->randomNumber(5));
        $email = $username . '@fgo.edu';

        $phone = $this->faker->numerify('+601########');

        $user = User::factory()->create([
            'access_level' => 3,
            'name' => $name,
            'email' => $email
        ]);

        return [
            'staff_id' => $this->faker->unique()->numberBetween(1000, 9999),
            'user_id' => $user->user_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'department' => $this->faker->randomElement(['Computer Science', 'Software Engineering', 'Information Systems', 'Data Science', 'Cybersecurity'])
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Lecturer $lecturer) {
            //
        })->afterCreating(function (Lecturer $lecturer) {
            //
        });
    }
}