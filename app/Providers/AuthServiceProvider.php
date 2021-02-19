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

        Gate::resource('militars', 'MilitarPolicy');
        Gate::resource('cidades', 'CidadePolicy');
        Gate::resource('guarnicaos', 'GuarnicaoPolicy');
        Gate::resource('servicos', 'ServicoPolicy');
        Gate::resource('viaturas', 'ViaturaPolicy');
    }
}
