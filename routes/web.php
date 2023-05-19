<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/form', function () {
    return view('taskForm');
})->name('form');



Route::prefix('api')->group(function () use ($router) {

    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    Route::prefix('tasks')->group(function () use ($router) {
        
        Route::post('/', 'TaskController@postNewTask');

            Route::group(['middleware' => 'auth'], function () use ($router) {
            $router->get('/', 'TaskController@getAllTasks');
            $router->get('/{id}', 'TaskController@getTaskById');
            $router->put('/{id}', 'TaskController@editTaskById');
            $router->delete('/{id}', 'TaskController@deleteTaskById');
        });
    });
});