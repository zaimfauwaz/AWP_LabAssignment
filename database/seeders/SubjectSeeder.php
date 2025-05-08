<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('subjects')->insert([
            [
                'subject_id' => 14145,
                'name' => 'AWS Essentials',
                'course' => 'BSc Computer Science',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 15146,
                'name' => 'Data Structures and Algorithms',
                'course' => 'BSc Software Engineering',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 15147,
                'name' => 'Relational Databases',
                'course' => 'BSc Software Engineering',
                'credit_hours' => 4,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 14148,
                'name' => 'Handling Linux Servers',
                'course' => 'BSc Computer Science',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 17149,
                'name' => 'Unreal Engine Development',
                'course' => 'BSc Games Development',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 15150,
                'name' => 'Advanced Web Programming',
                'course' => 'BSc Software Engineering',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 15151,
                'name' => 'Mobile App Development',
                'course' => 'BSc Software Engineering',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 14152,
                'name' => 'Machine Learning',
                'course' => 'BSc Computer Science',
                'credit_hours' => 4,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 16153,
                'name' => 'Cyber Security',
                'course' => 'BSc Cybersecurity',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 18154,
                'name' => 'Large Language Models',
                'course' => 'BSc Atificial Intelligence',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 19155,
                'name' => 'Data Visualization Programming',
                'course' => 'BSc Data Science',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
            [
                'subject_id' => 13156,
                'name' => 'Data Communication and Networking',
                'course' => 'BSc Information Technology',
                'credit_hours' => 3,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
            ],
        ]);
    }
}
