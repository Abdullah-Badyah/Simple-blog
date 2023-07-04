<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Facades\Blade;

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
        Paginator::useBootstrap();
        
        Blade::directive('markdown', function ($expression) {
            $converter = new CommonMarkConverter();
            $markdown = e($expression);
    
            return $converter->convertToHtml($markdown);
        });
    }
}
