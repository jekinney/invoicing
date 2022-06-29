<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('fees', [\App\Http\Controllers\FeeController::class, 'index']);
    Route::get('fee/show/{fee}', [\App\Http\Controllers\FeeController::class, 'show']);
    Route::get('fee/edit/{fee}', [\App\Http\Controllers\FeeController::class, 'edit']);
    Route::post('fee/store', [\App\Http\Controllers\FeeController::class, 'store']);
    Route::patch('fee/update/{fee}', [\App\Http\Controllers\FeeController::class, 'update']);
    Route::delete('fee/remove/{fee}', [\App\Http\Controllers\FeeController::class, 'remove']);
});
