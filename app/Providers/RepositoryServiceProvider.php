<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\LotteryCodeRepositoryInterface;
use App\Repositories\LotteryCodeRepository;

use App\Repositories\RewardRepositoryInterface;
use App\Repositories\RewardRepository;


/**
 * RepositoryServiceProvider class
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->app->bind(LotteryCodeRepositoryInterface::class, LotteryCodeRepository::class);
        $this->app->bind(RewardRepositoryInterface::class, RewardRepository::class);
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
    }
}
