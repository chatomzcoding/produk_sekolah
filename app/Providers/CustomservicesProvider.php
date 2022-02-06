<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomservicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Http/Helpers/Sistem/bilangan.php';
        require_once app_path() . '/Http/Helpers/Sistem/data.php';
        require_once app_path() . '/Http/Helpers/Sistem/sistem.php';
        require_once app_path() . '/Http/Helpers/Sistem/waktu.php';
        require_once app_path() . '/Http/Helpers/Sistem/view.php';
        require_once app_path() . '/Http/Helpers/Custom/data.php';
        require_once app_path() . '/Http/Helpers/Custom/db.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
