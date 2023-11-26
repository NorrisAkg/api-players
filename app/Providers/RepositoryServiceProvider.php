<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Players\Repositories\PlayerRepository;
use App\Core\Positions\Repositories\PositionRepository;
use App\Core\Players\Repositories\Interfaces\PlayerRepositoryInterface;
use App\Core\Positions\Repositories\Interfaces\PositionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, PositionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
