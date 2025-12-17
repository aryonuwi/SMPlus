<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CapacityController;
use App\Http\Controllers\Api\ReportController;

Route::get('/capacity/chart', [CapacityController::class, 'chart']);
Route::get('/report/cloud-capacity', [ReportController::class, 'download']);
