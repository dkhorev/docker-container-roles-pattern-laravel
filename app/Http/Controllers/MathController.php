<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\MathAddEvent;

class MathController extends Controller
{
    protected function add(string $a, string $b): string
    {
        event(new MathAddEvent((int)$a, (int)$b));

        return 'OK';
    }
}
