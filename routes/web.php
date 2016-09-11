<?php

Route::get ('/', 'TaskController@index')->middleware('auth');
Route::post ('/task', 'TaskController@add')->middleware('auth');
Route::get ('/task/{task}', 'TaskController@editView')->middleware('auth');
Route::put ('/task/{task}', 'TaskController@edit')->middleware('auth');
Route::delete ('/task/{task}', 'TaskController@delete')->middleware('auth');

Route::get('/tag','TagController@index')->middleware('auth');
Route::delete('/tag/{tag}','TagController@delete')->middleware('auth');

Route::get('/profile','ProfileController@index')->middleware('auth');

Auth::routes();

