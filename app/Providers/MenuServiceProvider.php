<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share menu data with all views
        View::composer('*', function ($view) {
            $menu = Menu::whereNull('parent_id')->with('children')->orderBy('sort')->get();
            $view->with('menu', $menu);
            // dd($menu);
        });
    }

    public function register()
    {
        //
    }
}
