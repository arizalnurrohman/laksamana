<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use App\Models\Menu;

class SelectedPageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share the currently active menu with all views
        View::composer('*', function ($view) {
            // Ambil URL path dari request
            $currentUrl = Request::path();

            // Cari menu aktif berdasarkan URL
            $activeMenu = Menu::where('url', $currentUrl)->first();

            // Share menu aktif ke semua view
            $view->with('activeMenu', $activeMenu);
        });
    }

    public function register()
    {
        //
    }
}
