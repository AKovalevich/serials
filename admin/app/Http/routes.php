<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/admin/login', array('uses' => 'LoginAdminController@showLogin'));
Route::post('/admin/login', array('uses' => 'LoginAdminController@adminLogin'));
Route::get('/admin/dashboard', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@index',
  'roles' => ['admin']
]);

/**
 * Asset routes
 */
Route::get('/admin/dashboard/assets', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@assetList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/assets/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showAssetCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/assets/{id}/delete', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@assetDelete',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/assets/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@assetCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/assets/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showAssetEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/assets/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@assetEdit',
  'roles' => ['admin']
]);

/**
 * Users routes.
 */
Route::get('/admin/dashboard/users', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@userList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/users/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showUserCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/users/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showUserEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/users/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@userEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/users/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@userCreate',
  'roles' => ['admin']
]);

/**
 * Tags routes.
 */
Route::get('/admin/dashboard/tags', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@tagsList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/tags/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showTagCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/tags/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showTagEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/tags/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@tagEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/tags/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@tagCreate',
  'roles' => ['admin']
]);

/**
 * Genre routes.
 */
Route::get('/admin/dashboard/genres', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@genreList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/genres/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showGenreCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/genres/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showGenreEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/genres/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@genreEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/genres/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@genreCreate',
  'roles' => ['admin']
]);

/**
 * Image routes.
 */
Route::get('/admin/dashboard/images', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@imageList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/images/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showImageCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/images/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showImageEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/images/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@imageEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/images/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@imageCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/images/{id}/delete', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@imageDelete',
  'roles' => ['admin']
]);

/**
 * Video routes.
 */
Route::get('/admin/dashboard/videos', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@videoList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/videos/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showVideoCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/videos/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showVideoEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/videos/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@videoEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/videos/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@videoCreate',
  'roles' => ['admin']
]);

/**
 * Episode routes.
 */
Route::get('/admin/dashboard/episodes', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@episodeList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/episodes/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showEpisodeCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/episodes/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showEpisodeEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/episodes/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@episodeEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/episodes/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@episodeCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/episodes/{id}/delete', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@episodeDelete',
  'roles' => ['admin']
]);


/**
 * Slider routes.
 */
Route::get('/admin/dashboard/sliders', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@sliderList',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/sliders/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showSliderCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/sliders/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showSliderEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/sliders/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@sliderEdit',
  'roles' => ['admin']
]);
Route::post('/admin/dashboard/sliders/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@sliderCreate',
  'roles' => ['admin']
]);