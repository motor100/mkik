<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     * @return mixed
     */
    public function boot(): mixed
    {
        $this->registerPolicies();

        Gate::define("view-dashboard", function (User $user) {
            if ($user) {
                return $user->name == "site_admin";
            }
            return false;
        });
        return false;
    }
}
