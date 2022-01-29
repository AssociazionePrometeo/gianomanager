<?php

namespace App\Providers;

use App\Card;
use App\Role;
use App\Services\EmailVerifier;
use App\User;
use App\Resource;
use App\Reservation;
use App\Subscription;
use App\Policies\UserPolicy;
use App\Policies\SubscriptionPolicy;
use App\Policies\RolePolicy;
use App\Policies\CardPolicy;
use App\Policies\ResourcePolicy;
use App\Policies\ReservationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Card::class => CardPolicy::class,
        User::class => UserPolicy::class,
        Subscription::class => SubscriptionPolicy::class,
        Role::class => RolePolicy::class,
        Reservation::class => ReservationPolicy::class,
        Resource::class => ResourcePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->app->singleton(EmailVerifier::class, function ($app) {
            $key = $app['config']['app.key'];

            if (starts_with($key, 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }

            return new EmailVerifier($app['mailer'], $app['hash'], $key);
        });
    }
}
