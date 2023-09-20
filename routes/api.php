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
    //list admin by id
    Route::get('/{admin}','findByid')->name('index')->middleware('auth:sanctum','abilities:admin');
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
    Route::get('/','index')->name('index');
    //liste user by id
    Route::get('/{user}','findUserById');
    //ajouter un admin
    Route::post('/create','store');
    //connexion
    Route::post('/login','login');
    //deconnexion
    Route::post('/logout','logout');
    //modfier
    Route::put('/edit/{user}','update');
    //supprimer
    Route::delete('/delete/{user}','delete')->middleware('auth:sanctum','abilities:user');
});

Route::prefix('role')->name('role.')->controller(\App\Http\Controllers\Api\RoleController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index');
    //list de role by id
    Route::get('/{role}','findRoleById');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{role}','update');
    //supprimer
    Route::delete('/delete/{role}','delete');
});

Route::prefix('restaurant')->name('restaurant.')->controller(\App\Http\Controllers\Api\RestaurantController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index');
    //list de restaurant by id
    Route::get('/{restaurant}','findRestaurantById');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{restaurant}','update');
    //supprimer
    Route::delete('/delete/{restaurant}','delete');
});

Route::prefix('categorie')->name('categorie.')->controller(\App\Http\Controllers\Api\CategoriesController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index');
    //list de categorie by id
    Route::get('/{categorie}','findCategorieById');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{categorie}','update');
    //supprimer
    Route::delete('/delete/{categorie}','delete');
});

Route::prefix('galerie')->name('galerie.')->controller(\App\Http\Controllers\Api\GalerieImageController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{galerie}','update');
    //supprimer
    Route::delete('/delete/{galerie}','delete');
});

Route::prefix('plat')->name('plat.')->controller(\App\Http\Controllers\Api\PlatController::class)->group(function (){
    //liste des admins
    Route::get('/','index')->name('index');
    //list de plat by id
    Route::get('/{plat}','findPlatByid');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{plat}','update');
    //supprimer
    Route::delete('/delete/{plat}','delete');
});

Route::prefix('commande')->name('commande.')->controller(\App\Http\Controllers\Api\CommandeController::class)->group(function (){
    Route::post('/pannier/{id}','addCart')->middleware('auth:sanctum','abilities:user');
    Route::get('/pannier/show','cartShow')->middleware('auth:sanctum','abilities:user');
    /*//liste des admins
    Route::get('/','index')->name('index');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{plat}','update');
    //supprimer
    Route::delete('/delete/{plat}','delete');*/
});

Route::prefix('panier')->name('panier.')->controller(\App\Http\Controllers\Api\PanierController::class)->group(function (){
    Route::post('/create/{id}','store')->middleware('auth:sanctum','abilities:user');
    Route::patch('/show','panierShow')->middleware('auth:sanctum','abilities:user');
    //list de plat by id
    Route::get('/{panier}','findPlatByid');
    /*//liste des admins
    Route::get('/','index')->name('index');
    //ajouter un role
    Route::post('/create','store');
    //modfier
    Route::put('/edit/{plat}','update');
    //supprimer
    Route::delete('/delete/{plat}','delete');*/
});
