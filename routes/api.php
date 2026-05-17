<?php

use App\Http\Controllers\Api\IncidentController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::get('/incidents', [IncidentController::class, 'index']);
    Route::get('/incidents/{id}', [IncidentController::class, 'show']);
});