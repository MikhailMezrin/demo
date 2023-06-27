<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('mainPage');
})->name('main');

Route::get('/registration', function () {
    return view('registrationForm');
})->name('registration');

Route::get('/form', "TaskController@postTaskForm")->name('form');
Route::get('/edit-task/{id}', 'TaskController@editUserTaskForm')->name('editTaskForm');
Route::get('/delete-task/{id}', 'TaskController@deleteUserTaskForm')->name('deleteTaskForm');
Route::post('/userTask', 'TaskController@getUserTasksForm')->name('tasks');

Route::get('/select-user', 'AuthController@selectUser')->name('selectUser');


Route::prefix('api')->group(function () use ($router) {

    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@selectUser');

    Route::prefix('tasks')->group(function () use ($router) {
        
        Route::post('/', 'TaskController@postNewTask');
        $router->get('/', 'TaskController@getAllTasks');
        //$router->get('/{id}', 'TaskController@getTaskById');
        $router->put('/edit/{id}', 'TaskController@editTaskById')->name('edit');
        $router->delete('/delete/{id}', 'TaskController@deleteTaskById')->name('delete');

            //Route::group(['middleware' => 'auth'], function () use ($router) {
        //});
    });
});