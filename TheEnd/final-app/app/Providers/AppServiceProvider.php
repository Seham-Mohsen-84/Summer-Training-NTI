<?php

namespace App\Providers;

use App\Models\final_app;
use App\Policies\FinalAppPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
    protected $policies = [
        \App\Models\final_app::class => \App\Policies\FinalAppPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }

}
