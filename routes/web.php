<?php
Route::get('/', 'SchoolboardController@index')->name('schoolboard.index');
Route::get('/schoolboard/{schoolboardId}', 'SchoolboardController@students')
    ->name('schoolboard.students')->where(['schoolboardId' => '[0-9]+']);
Route::get('/schoolboard/{schoolboardId}/student/{studentId}', 'SchoolboardController@student')
    ->name('schoolboard.student')->where(['schoolboardId' => '[0-9]+', 'studentId' => '[0-9]+']);
Route::post('/schoolboard/addgrade', 'SchoolboardController@addGrade')->name('schoolboard.add_grade');