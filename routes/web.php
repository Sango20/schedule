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

Route::get('/home', 'ScheduleController@index');
Route::get('/home/calendar','ScheduleController@calendar');
Route::get('/home/make/{date}','ScheduleController@make');
Route::get('/home/configuration','ScheduleController@configuration');
Route::post('/home','ScheduleController@store');
Route::post('/schedule', 'ScheduleController@graph');
Route::get('/update', 'ScheduleController@reload');
Route::post('/view', 'ScheduleController@set');
Route::post('/home/test', 'ScheduleController@set');
Route::get('/home/view', 'ScheduleController@view');
Route::get('/home/view/log/{date}', 'ScheduleController@log');
Route::get('/home/view/today', 'ScheduleController@today');
Auth::routes();