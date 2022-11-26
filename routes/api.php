<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('announcements')->controller(AnnouncementController::class)->group(function () {
    Route::get('', 'index')->name('announcements.index');
    Route::get('{announcement}', 'show')->name('announcements.show');
    Route::post('', 'store')->name('announcements.store');
    Route::put('{announcement}', 'update')->name('announcements.update');
    Route::delete('{announcement}', 'delete')->name('announcements.delete');
});
