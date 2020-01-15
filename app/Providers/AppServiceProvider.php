<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infoempresa;

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
        if (config('app.debug')){
            $assets_version = hash('md5', rand());
        } else {
            $assets_version = '3';
        }
        //dd(collect(Area::get(['id', 'nombre', 'slug'])->toArray())->where('slug.es', 'tubos-y-canos'));
        if (php_sapi_name() != 'cli') {
            view()->share([
                'active' => '',
                'assets_version' => $assets_version,
                'query_search'   => '',
                'infoempresa'   => Infoempresa::firstOrNew([])
            ]);
            /*view()->composer('*', function ($view)
            {
                //...with this variable
                $view->with('privatezone', auth()->guard('client'));
                $view->with('__admin_menu', 'admin.menu');
            });*/
        }
    }
}
