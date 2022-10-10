<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Manager;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
        // $this->registerPolicies();
        // Passport::$registersRoutes/;

        // Passport::routes();;






        Gate::define('manage-users', function(User $user) {
            if ($user->role_id==1) {
                return true;
            }
        });

        Gate::define('manage-property', function(Manager $manager) {
            if (!$manager) {
                return response()->json([
                    'message'=>'You are NOT allowed'
                ]);
            }else {
                return true;
            }
        });
    }
}
