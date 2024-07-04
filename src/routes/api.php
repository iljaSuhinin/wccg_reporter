<?php

use Illuminate\Support\Facades\Route;
use Packages\Reporter\Http\Controllers\ReportController;

Route::prefix('/api/reporter')->group(function () {
    Route::post('/', [ReportController::class, 'report']);
});
