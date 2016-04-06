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

//$app->get('/', function () use ($app) {
//    return $app->version();
//});


$app->group(['prefix' => 'api/1.0', 'middleware' => 'jwt.auth'], function($app) {
    $app->get('/', 'App\Http\Controllers\Controller@index');
});

$app->group(['prefix' => 'api/1.0'], function($app) {
    $app->post('auth/login', 'App\Http\Controllers\Auth\AuthController@postLogin');
});
