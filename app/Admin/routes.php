<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
	'prefix'        => config('admin.route.prefix'),
	'namespace'     => config('admin.route.namespace'),
	'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
	$router->resource('sliders', SlidersController::class);
	$router->resource('details', DetailsController::class);
	$router->resource('maps', MapsController::class);
	$router->resource('sidebars', SidebarsController::class);
	$router->get('/', 'HomeController@index');
	$router->post('map/updatePosition', 'MapsController@updatePosition');
});
