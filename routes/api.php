<?php

declare(strict_types=1);

use App\Http\Controllers\MathController;

Route::get('/{a}+{b}', [MathController::class, 'add']);
