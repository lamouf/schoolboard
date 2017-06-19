<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/students', 'Api\StudentController@getAll')->name('api.student.all');
Route::get('/students/{studentId}', 'Api\StudentController@getOne')->name('api.student.one');
Route::get('/schoolboards', 'Api\SchoolBoardController@getAll')->name('api.schoolboard.all');
Route::get('/schoolboards/{schoolboardId}', 'Api\SchoolBoardController@getOne')->name('api.schoolboard.one');
