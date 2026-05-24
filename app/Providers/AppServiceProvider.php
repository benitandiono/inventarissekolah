<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;


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
    $setting = Setting::first();

    if (!$setting) {
        $setting = Setting::create([
            'nama_instansi' => 'NAMA SEKOLAH/INSTANSI'
        ]);
    }

    View::share('globalSetting', $setting);
}

}
