<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // untuk menggunakan view paginasi bootstrap
        Paginator::useBootstrap();

        // untuk Gate
        Gate::define('admin', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('sales', function (User $user) {
            return $user->role_id == 2;
        });

        // untuk menampilkan format number
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
    }
}
