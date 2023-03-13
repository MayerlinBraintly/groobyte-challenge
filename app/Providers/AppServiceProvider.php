<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\CustomerRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\SubscriptionRepositoryInterface;
use App\Repositories\CustomerRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }
}
