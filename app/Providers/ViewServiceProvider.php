<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {   
        // Шаблон главной страницы
        view()->composer('layouts.main', function ($view) // прикрепить компоновщик к шаблону layouts.main
        {
            //
        });

        // Шаблон панели администратора
        view()->composer('dashboard.layout', function ($view)
        {
            // Новые документы
            // $abit_count = DB::table('podat_dokumenties')
            //                 ->where('status', 'В обработке')
            //                 ->count();
            $abit_count = \App\Models\Podat_dokumenty::where('status', 'В обработке')->count();

            if($abit_count > 9) {
                $abit_count = "9+";
            }

            $view->with('abit_count', $abit_count);
        });
    }
}
