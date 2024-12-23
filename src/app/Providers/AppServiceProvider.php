<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CreateQiitaArticlesInterface;
use App\Repositories\CreateQiitaArticles;
use App\Services\Interfaces\GetQiitaArticlesInterface;
use App\Services\GetQiitaArticles;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CreateQiitaArticlesInterface::class, CreateQiitaArticles::class);
        $this->app->bind(GetQiitaArticlesInterface::class, GetQiitaArticles::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
