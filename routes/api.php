<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/log-activity', [ApiController::class, 'logActivity'])->name('api.log-activity');
Route::get('/announcement', [ApiController::class, 'announcement'])->name('api.announcement');
Route::get('/announcementStatus', [ApiController::class, 'announcementStatus'])->name('api.announcement-status');
