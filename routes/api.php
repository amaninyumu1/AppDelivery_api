<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//check valid token
Route::prefix('token')->name('faild.')->controller(\App\Http\Controllers\Controller::class)->group(function (){
    Route::any('/', 'faildAccessToken')->name('token');
});
Route::prefix('admin')->name('admin.')->controller(\App\Http\Controllers\Api\AdminController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index')->middleware('auth:sanctum','abilities:admin');
    //ajouter un admin
    Route::post('/create','store')->middleware('auth:sanctum','abilities:admin');
    //connexion
    Route::post('/login','login');
    //deconneion
    Route::post('/logout','logout')->middleware('auth:sanctum','abilities:admin');
    //modfier
    Route::put('/edit/{admin}','update')->middleware('auth:sanctum','abilities:admin');
    //supprimer
    Route::delete('/delete/{admin}','delete')->middleware('auth:sanctum','abilities:admin');
});

Route::prefix('user')->name('user.')->controller(\App\Http\Controllers\Api\UserController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index')->middleware('auth:sanctum','abilities:user');
    //ajouter un admin
    Route::post('/create','store');
    //connexion
    Route::post('/login','login');
    //deconnexion
    Route::post('/logout','logout')->middleware('auth:sanctum','abilities:user');
    //modfier
    Route::put('/edit/{user}','update')->middleware('auth:sanctum','abilities:user');
    //supprimer
    Route::delete('/delete/{user}','delete')->middleware('auth:sanctum','abilities:user');
});

Route::prefix('role')->name('role.')->controller(\App\Http\Controllers\Api\RoleController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{role}','update');
    //supprimer
    Route::delete('/delete/{role}','delete');
});
