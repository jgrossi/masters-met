<?php

Route::get('/', function() {
	return redirect('extractions');
});

Route::get('extractions/last', ['as' => 'extractions.last', 'uses' => 'ExtractionsController@last']);
Route::get('extractions/{id}/details/{tool}', ['as' => 'extractions.results', 'uses' => 'ExtractionsController@results']);
Route::resource('extractions', 'ExtractionsController', ['except' => ['edit', 'update', 'destroy']]);

Route::get('collections', 'CollectionsController@index');
Route::get('collections/create', 'CollectionsController@create');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
