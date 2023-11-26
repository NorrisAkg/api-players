<?php

namespace App\Providers;

use App\Core\Players\Repositories\Interfaces\PlayerRepositoryInterface;
use App\Core\Players\Repositories\PlayerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
