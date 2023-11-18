<?php

use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Models\User;


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


Route::get('/', function () {
    return view('landing');
});
 

    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register', [LoginController::class, 'registerPost'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginPost'])->name('login');

   
    Route::get('/', [TemplateController::class, 'index']);
    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
    
    //google login route
    Route::get('auth/facebook', 'App\Http\Controllers\LoginController@facebookRedirect');
    Route::get('auth/facebook/callback', 'App\Http\Controllers\LoginController@loginWithFacebook');

    //facebook login route
    Route::get('auth/google',[LoginController::class,'redirect'])->name('google-auth');
    Route::get('auth/google/call-back',[LoginController::class,'callbackGoogle']);
    

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

