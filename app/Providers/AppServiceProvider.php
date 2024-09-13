<?php

namespace App\Providers;

use App\Reositories\Interfaces\UserRepositoryInterface;
use App\Reositories\Interfaces\WorkerRepositoryInterface;
use App\Reositories\UserRepository;
use App\Reositories\WorkerRepository;
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
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(WorkerRepositoryInterface::class,WorkerRepository::class);
    }
}
