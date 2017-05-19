<?php
Route::get('/', 'SchoolboardController@index')->name('schoolboard.index');
Route::get('/schoolboard/{schoolboardId}', 'SchoolboardController@students')->name('schoolboard.students');
Route::get('/schoolboard/{schoolboardId}/student/{studentId}', 'SchoolboardController@student')->name('schoolboard.student');
Route::post('/schoolboard/addgrade', 'SchoolboardController@addGrade')->name('schoolboard.add_grade');