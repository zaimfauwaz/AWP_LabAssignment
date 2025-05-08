<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configure pagination to use Bootstrap
        Paginator::useBootstrap();

        Gate::define('manage-students', function ($user) {
            return $user->access_level == 9; // Admin level
        });

        Gate::define('manage-lecturers', function ($user) {
            return $user->access_level == 9; // Admin level
        });
        
        // Define gates for authorization
        Gate::define('manage-subjects', function ($user) {
            return $user->access_level == 3; // Lecturer level
        });

        // Assessment management gates
        Gate::define('manage-assessments', function ($user) {
            return $user->access_level == 3; // Lecturer level - full access
        });

        Gate::define('view-own-assessments', function ($user, $assessment) {
            if ($user->access_level == 7) { // Student level
                $student = \App\Models\Student::where('user_id', $user->id)->first();
                return $student && $assessment->student_id === $student->student_id;
            }
            return $user->access_level == 3; // Lecturers can view all
        });

    }
}
