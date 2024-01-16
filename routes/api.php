<?php

<<<<<<< HEAD
use App\Http\Controllers\LoginController;
=======
>>>>>>> e96bf7583f6ee79f606bab5df59d826b3c0f4138
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

<<<<<<< HEAD
Route::post('/Resset-Password',[LoginController::class,'RessetPassword']);



=======
>>>>>>> e96bf7583f6ee79f606bab5df59d826b3c0f4138
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
