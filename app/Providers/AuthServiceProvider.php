<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('update',function($user,$question){
            return $user->id === $question->user_id;
        });

        \Gate::define('delete',function($user,$question){
            return $user->id === $question->user_id;
        });

        
        \Gate::define('update',function($user,$answer){
            return $user->id === $answer->user_id;
        });

        \Gate::define('delete',function($user,$answer){
            return $user->id === $answer->user_id;
        });
    }
}
