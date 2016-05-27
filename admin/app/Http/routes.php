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
Route::get('/admin/login', ['uses' => 'LoginAdminController@showLogin', 'as' => 'admin.login']);
Route::post('/admin/login', ['uses' => 'LoginAdminController@adminLogin']);
Route::get('/admin/logout', ['uses' => 'LoginAdminController@adminLogout', 'as' => 'admin.logout']);

Route::get('/admin/dashboard', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@index',
  'roles' => ['admin'],
  'as' => 'admin.dashboard'
]);

Route::get('/admin/dashboard/system', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@systemInfo',
  'roles' => ['admin'],
  'as' => 'admin.dashboard.system'
]);

Route::get('/admin/dashboard/content', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@contentInfo',
  'roles' => ['admin'],
  'as' => 'admin.dashboard.content'
]);

Route::get('/admin/dashboard/media', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@mediaInfo',
  'roles' => ['admin'],
  'as' => 'admin.dashboard.media'
]);

/**
 * Asset routes
 */
Route::get('/admin/dashboard/assets', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@assetList',
  'roles' => ['admin'],
  'as' => 'asset.list'
]);
Route::get('/admin/dashboard/assets/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showAssetCreate',
  'roles' => ['admin'],
  'as' => 'asset.create'
]);
Route::delete('/admin/dashboard/assets/{id}/delete', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@assetDelete',
  'roles' => ['admin'],
  'as' => 'asset.delete'
]);
Route::post('/admin/dashboard/assets/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@assetCreate',
  'roles' => ['admin']
]);
Route::get('/admin/dashboard/assets/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showAssetEdit',
  'roles' => ['admin'],
  'as' => 'asset.edit'
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
  'roles' => ['admin'],
  'as' => 'user.list'
]);
Route::get('/admin/dashboard/users/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showUserCreate',
  'roles' => ['admin'],
  'as' => 'user.create'
]);
Route::get('/admin/dashboard/users/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showUserEdit',
  'roles' => ['admin'],
  'as' => 'user.edit'
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
  'roles' => ['admin'],
  'as' => 'tag.list'
]);
Route::get('/admin/dashboard/tags/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showTagCreate',
  'roles' => ['admin'],
  'as' => 'tag.create'
]);
Route::get('/admin/dashboard/tags/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showTagEdit',
  'roles' => ['admin'],
  'as' => 'tag.edit'
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
  'roles' => ['admin'],
  'as' => 'genre.list'
]);
Route::get('/admin/dashboard/genres/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showGenreCreate',
  'roles' => ['admin'],
  'as' => 'genre.create'
]);
Route::get('/admin/dashboard/genres/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showGenreEdit',
  'roles' => ['admin'],
  'as' => 'genre.edit'
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
  'roles' => ['admin'],
  'as' => 'image.list'
]);
Route::get('/admin/dashboard/images/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showImageCreate',
  'roles' => ['admin'],
  'as' => 'image.create'
]);
Route::get('/admin/dashboard/images/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showImageEdit',
  'roles' => ['admin'],
  'as' => 'image.edit'
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
Route::delete('/admin/dashboard/images/{id}/delete', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@imageDelete',
  'roles' => ['admin'],
  'as' => 'image.delete'
]);

/**
 * Video routes.
 */
Route::get('/admin/dashboard/videos', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@videoList',
  'roles' => ['admin'],
  'as' => 'video.list'
]);
Route::get('/admin/dashboard/videos/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showVideoCreate',
  'roles' => ['admin'],
  'as' => 'video.create'
]);
Route::get('/admin/dashboard/videos/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showVideoEdit',
  'roles' => ['admin'],
  'as' => 'video.edit'
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
Route::delete('/admin/dashboard/videos/{id}/delete', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@videosDelete',
  'roles' => ['admin'],
  'as' => 'video.delete'
]);

/**
 * Episode routes.
 */
Route::get('/admin/dashboard/episodes', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@episodeList',
  'roles' => ['admin'],
  'as' => 'episode.list'
]);
Route::get('/admin/dashboard/episodes/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showEpisodeCreate',
  'roles' => ['admin'],
  'as' => 'episode.create'
]);
Route::get('/admin/dashboard/episodes/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showEpisodeEdit',
  'roles' => ['admin'],
  'as' => 'episode.edit'
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
Route::delete('/admin/dashboard/episodes/{id}/delete', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@episodeDelete',
  'roles' => ['admin'],
  'as' => 'episode.delete'
]);


/**
 * Slider routes.
 */
Route::get('/admin/dashboard/sliders', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@sliderList',
  'roles' => ['admin'],
  'as' => 'slider.list'
]);
Route::get('/admin/dashboard/sliders/create', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showSliderCreate',
  'roles' => ['admin'],
  'as' => 'slider.create'
]);
Route::get('/admin/dashboard/sliders/{id}/edit', [
  'middleware' => ['role'],
  'uses' => 'DashboardController@showSliderEdit',
  'roles' => ['admin'],
  'as' => 'slider.edit'
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

/**
 * Media
 *   Routes for images
 */
Route::get('/media/poster/{id}', [
  'uses' => 'DashboardController@getPosterImage',
  'as' => 'poster.image'
]);
Route::get('/media/slide/{id}', [
  'uses' => 'DashboardController@getSlideImage',
  'as' => 'slide.image'
]);
Route::get('/media/preview/{id}', [
  'uses' => 'DashboardController@getPreviewImage',
  'as' => 'preview.image'
]);
Route::get('/media/background/{id}', [
  'uses' => 'DashboardController@getBackgroundImage',
  'as' => 'background.image'
]);

Route::get('/media/video/{id}', [
  'uses' => 'DashboardController@getVideoFile',
  'as' => 'video.file'
]);