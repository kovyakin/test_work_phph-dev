<?php

use App\Http\Controllers\Api\Referrals\AttachController;
use App\Http\Controllers\Api\Referrals\EarningsController;
use App\Http\Controllers\Api\Referrals\MyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
|
| Текущий мастер приходит в заголовке X-Master-Id и уже разложен
| в атрибуты запроса middleware'ом ResolveCurrentMaster:
|
|     $master = $request->attributes->get('current_master');
|
| Здесь нужно написать три роута — см. README.md.
|
*/

Route::get('/ping', fn() => ['ok' => true]);

Route::middleware(\App\Http\Middleware\ResolveCurrentMaster::class)->group(function () {
    Route::post('/referrals/attach',AttachController::class)->name('referrals.attach');

    Route::get('/referrals/my', MyController::class)->name('api.referrals.my');

    Route::get('/referrals/earnings', EarningsController::class)->name('api.referrals.earnings');
});

// TODO: POST /api/referrals/attach
// TODO: GET  /api/referrals/my
// TODO: GET  /api/referrals/earnings
