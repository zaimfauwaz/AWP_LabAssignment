<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('manage-assessments', function ($user) {
            return $user->access_level == 3; // Lecturer level
        });
    }
}
