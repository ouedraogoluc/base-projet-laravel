<?php

namespace App\Providers;

use App\Repositories\EpreuveRepository;
use App\Repositories\Interfaces\EpreuveRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EpreuveRepositoryInterface::class, EpreuveRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
