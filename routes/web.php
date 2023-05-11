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

Route::get('/tasks', 'taskController@getAllTasks');
Route::get('/tasks/{id}', 'taskController@getTaskById');

Route::post('/tasks', 'taskController@postNewTask');

Route::put('/tasks/{id}', 'taskController@editTaskById');

Route::delete('/tasks/{id}', 'taskController@delitTaskById');