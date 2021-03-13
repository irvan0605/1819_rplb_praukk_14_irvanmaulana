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

        //
        Gate::define('admin', function ($user) {
            return $user->level_id == 1;
        });
        Gate::define('bank', function ($user) {
            return $user->level_id == 2;
        });
        Gate::define('pelanggan', function ($user) {
            return $user->level_id == 3;
        });

        Gate::define('viewLarecipe', function ($user) {
            if ($user->level_id == 1) {
                return true;
            } else {
                return abort(403);
            }
        });
    }
}
