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

//
//      HOME
//

Route::get('/','App\Http\Controllers\Main@Home')->name('home');

//
//      NEW TASK
//

Route::get('/new_task','App\Http\Controllers\Main@new_task')->name('new_task');
Route::post('/new_task_submit', 'App\Http\Controllers\Main@new_task_submit')->name('new_task_submit');

//
//      DONE or UNDONE TASK

Route::get('/task_done/{id}','App\Http\Controllers\Main@task_done')->name('task_done');
Route::get('/task_undone/{id}','App\Http\Controllers\Main@task_undone')->name('task_undone');

//
//      EDIT TASK
//

Route::get('/edit_task_frm/{id}','App\Http\Controllers\Main@edit_task')->name('edit_task');
Route::post('/edit_task_submit','App\Http\Controllers\Main@edit_task_submit')->name('edit_task_submit');

//
//      VISIBLE OR INVISIBLE TASK
//

Route::get('/task_invisible/{id}','App\Http\Controllers\Main@task_invisible')->name('task_invisible');
Route::get('/task_visible/{id}','App\Http\Controllers\Main@task_visible')->name('task_visible');
Route::get('/list_invisibles', 'App\Http\Controllers\Main@list_invisibles')->name('list_invisibles');
