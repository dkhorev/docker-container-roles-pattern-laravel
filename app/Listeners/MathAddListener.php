<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\MathAddEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class MathAddListener implements ShouldQueue
{
    public function handle(MathAddEvent $event): void
    {
        $c = $event->a + $event->b;
        Log::info("Math add $event->a and $event->b equals $c");
    }
}
