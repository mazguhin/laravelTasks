<?php

Route::get ('/', 'TaskController@index');
Route::post ('/task', 'TaskController@add');
Route::get ('/task/{id}', 'TaskController@editView');
Route::put ('/task/{id}', 'TaskController@edit');
Route::delete ('/task/{id}', 'TaskController@delete');