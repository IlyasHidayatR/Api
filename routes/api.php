<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth;
use App\Http\Controllers\API\AnggotaControl;
use Illuminate\Support\Facades\DB;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/login', [Auth::class, 'login']);
Route::post('/register', [Auth::class, 'register']);

Route::middleware('auth')->group(function(){
    Route::get('/', [Anggota::class, 'index']);
    Route::get('/{id_anggota}', [Anggota::class, 'show']);
    Route::post('/create', [Anggota::class, 'store']);
    Route::put('/update/{id_anggota}', [Anggota::class, 'update']);
    Route::delete('/delete/{id_anggota}', [Anggota::class, 'destroy']);
});