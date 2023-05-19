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

Route::get('/tasks', 'TaskController@getAllTasks');
Route::get('/tasks/{id}', 'TaskController@getTaskById');

Route::post('/tasks', 'TaskController@postNewTask');

Route::put('/tasks/{id}', 'TaskController@editTaskById');

Route::delete('/tasks/{id}', 'TaskController@delitTaskById');

Route::post('/register', 'AuthController@register');