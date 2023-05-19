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

Route::get('/', function () {
    return view('taskForm');
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

Route::group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/tasks', 'TaskController@getAllTasks');

    $router->get('/tasks/{id}', 'TaskController@getTaskById');

    $router->post('/tasks', 'TaskController@postNewTask');
    
    $router->put('/tasks/{id}', 'TaskController@editTaskById');
    
    $router->delete('/tasks/{id}', 'TaskController@delitTaskById');
});