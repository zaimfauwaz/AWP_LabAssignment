<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 lecturers
        Lecturer::factory()->count(5)->create();

        // Create 10 students
        Student::factory()->count(10)->create();

        $this->call([
            AdminSeeder::class,
            SubjectSeeder::class,
            // Add other seeders here
        ]);
    }
}