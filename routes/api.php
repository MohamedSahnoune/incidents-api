<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IncidentController;


Route::prefix('v1')->group(function () {
Route::get('incidents', [IncidentController::class, 'index']);
Route::get('incidents/{id}', [IncidentController::class, 'show']);
Route::post('incidents', [IncidentController::class, 'store']);
Route::patch('incidents/{id}/status', [IncidentController::class, 'updateStatus']);
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
