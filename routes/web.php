<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
	return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function ($router) {

	$router->group(['prefix' => 'posts'], function ($router) {
		$router->post('add', 'PostsController@createPost');
		$router->put('edit/{id}', 'PostsController@updatePost');
		$router->delete('delete/{id}', 'PostsController@deletePost');
		$router->get('view/{id}', 'PostsController@viewPost');
		$router->get('index', 'PostsController@index');
	});

	$router->group(['prefix' => 'users'], function ($router) {
		$router->post('add', 'UsersController@add');
		$router->get('view/{id}', 'UsersController@view');
		$router->put('edit/{id}', 'UsersCtontroller@edit');
		$router->delete('delete/{id}', 'UsersController@delete');
		$router->get('index', 'UsersController@index');
	});

});


