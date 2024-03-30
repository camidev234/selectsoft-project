<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        PaginationPaginator::useBootstrap();


        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
