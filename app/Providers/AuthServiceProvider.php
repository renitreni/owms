<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function () {
            return auth()->user()->role === 1;
        });

        Gate::define('agency', function () {
            return auth()->user()->role === 2;
        });

        Gate::define('employer', function () {
            return auth()->user()->role === 3;
        });

        Gate::define('gov', function () {
            return auth()->user()->role === 4;
        });
    }
}
