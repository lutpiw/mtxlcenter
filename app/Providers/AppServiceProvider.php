<?php

namespace App\Providers;

use App\Repositories\Contracts\ZiswafCampaignRepositoryInterface;
use App\Repositories\Contracts\ZiswafCategoryRepositoryInterface;
use App\Repositories\Contracts\ZiswafProgramRepositoryInterface;
use App\Repositories\Contracts\ZiswafTransactionRepositoryInterface;
use App\Repositories\ZiswafCampaignRepository;
use App\Repositories\ZiswafCategoryRepository;
use App\Repositories\ZiswafProgramRepository;
use App\Repositories\ZiswafTransactionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ZiswafCategoryRepositoryInterface::class, ZiswafCategoryRepository::class);
        $this->app->bind(ZiswafProgramRepositoryInterface::class, ZiswafProgramRepository::class);
        $this->app->bind(ZiswafCampaignRepositoryInterface::class, ZiswafCampaignRepository::class);
        $this->app->bind(ZiswafTransactionRepositoryInterface::class, ZiswafTransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
