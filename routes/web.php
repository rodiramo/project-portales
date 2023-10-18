<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']) 
->name('home');


    /*AUTH */
    
Route::get('login', [\App\Http\Controllers\AuthController::class, 'formLogin'])
    ->name('auth.formLogin');

Route::post('login', [\App\Http\Controllers\AuthController::class, 'processLogin'])
    ->name('auth.processLogin');


Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');


    /*RESERVE  */

    Route::post('games/{id}/reserve', [\App\Http\Controllers\GameReservationController::class, 'processReservation'])
    ->name('games.processReservation')
    ->whereNumber('id');

    /* RATING */
    Route::get('games/{id}/confirm-age', [\App\Http\Controllers\AgeConfirmationController::class, 'formConfirmation'])
    ->name('age-confirmation.formConfirmation')
    ->whereNumber('id');
Route::post('games/{id}/confirm-age', [\App\Http\Controllers\AgeConfirmationController::class, 'processConfirmation'])
    ->name('age-confirmation.processConfirmation')
    ->whereNumber('id');

    /* NEWS  */
Route::get('news', [\App\Http\Controllers\NewsController::class, 'index'])
    ->name('news.index');

Route::get('news/new', [\App\Http\Controllers\NewsController::class, 'formNew'])
    ->name('news.formNew')
    ->middleware(['auth']);
    
Route::post('news/new', [\App\Http\Controllers\NewsController::class, 'processNew'])
        ->name('news.processNew')
        ->middleware(['auth']);
    
    
    Route::get('news/{id}', [\App\Http\Controllers\NewsController::class, 'view'])
        ->name('news.view')
        ->whereNumber('id');
    
    Route::get('news/{id}/edit', [\App\Http\Controllers\NewsController::class, 'formUpdate'])
        ->name('news.formUpdate')
        ->middleware(['auth'])
        ->whereNumber('id');
    
    Route::post('news/{id}/edit', [\App\Http\Controllers\NewsController::class, 'processUpdate'])
        ->name('news.processUpdate')
        ->middleware(['auth'])
        ->whereNumber('id');
      
    Route::get('news/{id}/delete', [\App\Http\Controllers\NewsController::class, 'confirmDelete'])
    ->name('news.confirmDelete')
    ->middleware(['auth'])
    ->whereNumber('id');
    
    
    Route::post('news/{id}/delete', [\App\Http\Controllers\NewsController::class, 'processDelete'])
        ->name('news.processDelete')
        ->middleware(['auth'])
        ->whereNumber('id');
        
        /*GAME */

Route::get('games', [\App\Http\Controllers\GamesController::class, 'index'])
->name('games.index');

Route::get('games/new', [\App\Http\Controllers\GamesController::class, 'formNew'])
->name('games.formNew')
->middleware(['auth']);

Route::post('games/new', [\App\Http\Controllers\GamesController::class, 'processNew'])
    ->name('games.processNew')
    ->middleware(['auth']);


Route::get('games/{id}', [\App\Http\Controllers\GamesController::class, 'view'])
    ->name('games.view')    
    ->whereNumber('id');

Route::get('games/{id}/edit', [\App\Http\Controllers\GamesController::class, 'formUpdate'])
    ->name('games.formUpdate')
    ->middleware(['auth'])
    ->whereNumber('id');

Route::post('games/{id}/edit', [\App\Http\Controllers\GamesController::class, 'processUpdate'])
    ->name('games.processUpdate')
    ->middleware(['auth'])
    ->whereNumber('id');


Route::get('games/{id}/delete', [\App\Http\Controllers\GamesController::class, 'confirmDelete'])
->name('games.confirmDelete')
->middleware(['auth'])
->whereNumber('id');


Route::post('games/{id}/delete', [\App\Http\Controllers\GamesController::class, 'processDelete'])
    ->name('games.processDelete')
    ->middleware(['auth'])
    ->whereNumber('id');

Route::get('admin', [\App\Http\Controllers\AdminController::class, 'dashboard'])
->name('admin.dashboard');