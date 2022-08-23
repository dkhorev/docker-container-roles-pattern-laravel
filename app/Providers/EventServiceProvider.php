<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\MathAddEvent;
use App\Listeners\MathAddListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        MathAddEvent::class => [
            MathAddListener::class,
        ],
    ];

    public function boot()
    {
        // empty
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
