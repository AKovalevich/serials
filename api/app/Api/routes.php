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

/**
 * Routes with token
 */

$api->version('v1', ['middleware' => 'api.auth', 'providers' => 'jwt'], function ($api) {
    $api->get('users/{id}', 'App\Api\V1\Controllers\UserController@show');
    $api->get('assets/{id}', 'App\Api\V1\Controllers\AssetController@show');
});


/**
 * Free routes.
 */

$api->version('v1', [], function ($api) {
    $api->post('/register', 'App\Api\V1\Controllers\AuthenticateController@register');
    $api->post('/auth', 'App\Api\V1\Controllers\AuthenticateController@auth');
});