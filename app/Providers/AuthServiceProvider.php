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

        Gate::define('isPemohon', function($user) {
            return $user->role == 'pemohon';
        });

        Gate::define('isPegawaiNegeri', function($user) {
            return $user->role == 'pegawai_negeri';
        });        

        Gate::define('isPegawaiHq', function($user) {
            return $user->role == 'pegawai_hq';
        });          

        Gate::define('isPegawaiPdrm', function($user) {
            return $user->role == 'pegawai_pdrm';
        });             

        Gate::define('isPentadbir', function($user) {
            return $user->role == 'pentadbir';
        });
    }
}
