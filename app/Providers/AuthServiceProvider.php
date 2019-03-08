<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        try {
            if (\Schema::hasTable('permissions')) {
                // Dynamically register permissions with Laravel's Gate.
                foreach ($this->getPermissions() as $permission) {
                    $gate->define($permission->name, function ($user) use ($permission) {
                        return $user->hasPermission($permission);
                    });
                }
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return;
        }
        
        // Articles
        Gate::define('show-post', function ($user, $post) {
            echo "Show-post : authorization - checking<br />";
            foreach ($user->roles as $role) {
                if ($role->name == 'admin') {
                    echo "Role : admin.<br />";
                    return true;
                }
            }
            return $user->id == $post->author->id;
        });
        Gate::define('update-post', function ($user, $post) {
            return $user->roles[0]->name == 'admin' || $user->id == $post->author->id;
        });
    }

    /**
     * Fetch the collection of site permissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
