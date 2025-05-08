<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    protected $faker = null;

    public function definition(): array
    {
        if ($this->faker === null) {
            $this->faker = \Faker\Factory::create();
            $this->faker->seed(1234); // Fixed seed for consistency
        }

        $name = $this->faker->name();
        // Remove salutations and ensure we have a valid username
        $cleanName = trim(str_replace(['Dr.', 'Dr', 'Mr.', 'Mr', 'Mrs.', 'Mrs', 'Ms.', 'Ms', 'Prof.', 'Prof'], '', $name));
        $nameParts = array_filter(explode(' ', $cleanName)); // Remove empty elements
        $username = strtolower($nameParts[0] ?? 'user' . $this->faker->unique()->randomNumber(5));
        $email = $username . '@student.fgo.edu';
        $phone = $this->faker->numerify('+601########');

        $user = User::factory()->create([
            'access_level' => 7,
            'name' => $name,
            'email' => $email
        ]);

        $courses = [
            'Bachelor of Computer Science',
            'Bachelor of Software Engineering',
            'Bachelor of Information Systems',
            'Bachelor of Data Science',
            'Bachelor of Cybersecurity'
        ];
        $course = $this->faker->randomElement($courses);

        return [
            'student_id' => $this->faker->unique()->numberBetween(10000, 999999),
            'user_id' => $user->user_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'course' => $course,
            'intake' => $this->faker->randomElement(['2024/25', '2025/26']) . ' ' . $this->faker->randomElement(['March', 'September'])
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Student $student) {
            //
        })->afterCreating(function (Student $student) {
            //
        });
    }
}