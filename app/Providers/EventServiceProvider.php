<?php

namespace App\Providers;

use App\Category;
use App\Events\UserCreated;
use App\Listeners\UserCreatedListener;
use App\Observers\CategoryObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCreated::class => [
            UserCreatedListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // For Observer
        User::observe(UserObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
