<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Pages\Register;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', \App\Livewire\Pages\Register::class);
Route::get('/login', \App\Livewire\Pages\Login::class);
Route::get('/map', \App\Livewire\Pages\Map::class);
Route::post('/upload-audio', [AudioController::class, 'upload']);
Route::get('/testroute', function () {
    $code = "Funny Coder";

    // The email sending is done using the to method on the Mail facade
    Mail::to('4amir.amro@gmail.com')->send(new \App\Mail\VerificationCodeMail($code));
});

Route::group(['prefix' => 'google'], function () {
    Route::get('', [Register::class, 'redirectGoogle'])->name('google');
    Route::get('callback', [Register::class,'callbackGoogle']);
});
Route::group(['prefix' => 'facebook'], function () {
    Route::get('', [Register::class, 'redirectFaceBook'])->name('facebook');
    Route::get('callback', [Register::class,'callbackFaceBook']);
});
