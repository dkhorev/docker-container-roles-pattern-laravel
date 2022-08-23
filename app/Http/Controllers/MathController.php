<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class MathController extends Controller
{
    protected function add(string $a, string $b): void
    {
        Log::info('add', [$a, $b]);
    }
}
