<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        
        Gate::define('general_employee', function (User $user) {//一般社員の権限
            return $user->role_id === 1;
        });

        Gate::define('deputy_manager', function (User $user) {//課長の権限
            return $user->role_id === 2;
        });

        Gate::define('section_manager', function (User $user) {//次長・部長の権限
            return $user->role_id === 3 || $user->role_id === 4;
        });
    }
}
