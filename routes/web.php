<?php

use App\Http\Controllers\HistoryController;
use App\Models\History;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('form', function () {
    return view('url_form');
});

Route::prefix('player')->group(function () {
    Route::post('/', [HistoryController::class, 'store'])->name('player.store');
    Route::get('/{group_token}', [HistoryController::class, 'show'])->name('player.show');
});
