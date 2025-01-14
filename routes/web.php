<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('demo');
});
Route::get('/test-mail', [TestController::class,'testMail']);
Route::get('/kich-hoat', [TestController::class,'kichHoatMail']);
