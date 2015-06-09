<?php

Route::get('/', function() {
	return redirect('extractions');
});

Route::get('extractions/last', ['as' => 'extractions.last', 'uses' => 'ExtractionsController@last']);
Route::get('extractions/{id}/details/{tool_slug}', ['as' => 'extractions.results', 'uses' => 'ExtractionsController@results']);
Route::resource('extractions', 'ExtractionsController', ['except' => ['edit', 'update', 'destroy']]);

Route::post('collections/data-upload', ['as' => 'collections.data-upload', 'uses' => 'CollectionsController@dataUpload']);
Route::get('collections/{id}/papers', ['as' => 'collections.papers', 'uses' => 'CollectionsController@papers']);
Route::resource('collections', 'CollectionsController', ['only' => ['index', 'create', 'store', 'destroy']]);

Route::post('papers/upload', ['as' => 'papers.upload', 'uses' => 'PapersController@upload']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
