<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MathAddEvent
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(public int $a, public int $b)
    {
    }
}
