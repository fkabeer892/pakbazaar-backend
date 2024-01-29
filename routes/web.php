<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


$router->group(['prefix' => 'api'], function () use ($router) {
        // Auth Routes
        $router->post('auth/register', 'Auth\AuthController@register');
        $router->post('auth/login', 'Auth\AuthController@login');

    $router->get("category", "CategoryController@index");
    $router->post("category", "CategoryController@store");
    $router->put("category/{id}", "CategoryController@update");
    $router->delete("category/{id}", "CategoryController@destroy");
    $router->get("category/{id}", "CategoryController@show");

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->post('auth/logout', 'Auth\AuthController@logout');
        $router->post('refresh', 'Auth\AuthController@refresh');
        $router->get('/me', 'Auth\AuthController@me'); // Get authenticated User

        // User Routes
        $router->get('/users', 'User\UserController@index');
        $router->get('/users/{id}', 'User\UserController@show');
        $router->post('/users', 'User\UserController@store');
        $router->post('/users/{id}', 'User\UserController@update');
        $router->delete('/users/{id}', 'User\UserController@destroy');

        // Role Routes
        $router->get('/roles', 'User\RoleController@index');
        $router->get('/roles/{id}', 'User\RoleController@show');
        $router->post('/roles', 'User\RoleController@store');
        $router->post('/roles/{id}', 'User\RoleController@update');
        $router->delete('/roles/{id}', 'User\RoleController@destroy');

        // Permission Routes
        $router->get('/permissions', 'User\PermissionController@index');
        $router->get('/permissions/{id}', 'User\PermissionController@show');
        $router->post('/permissions', 'User\PermissionController@store');
        $router->post('/permissions/{id}', 'User\PermissionController@update');
        $router->delete('/permissions/{id}', 'User\PermissionController@destroy');

    });
});
