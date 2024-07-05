<?php

use Illuminate\Support\Facades\Route;
use Packages\Reporter\Http\Controllers\ReportController;

Route::prefix('/api/report')->group(function () {
    Route::any('/', [ReportController::class, 'report']);
});
