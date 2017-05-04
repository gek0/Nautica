<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * admin area
 */
Route::group(['before' => 'auth'], function() {
	Route::get('admin', function(){
		return Redirect::to('admin/ko-nama');
	});

	Route::group(['prefix' => 'admin'], function() {
		Route::post('o-nama', ['as' => 'admin-about-usPOST', 'uses' => 'AdminController@updateAboutUs']);
		Route::get('o-nama', ['as' => 'admin-about-us', 'uses' => 'AdminController@showAboutUs']);
		Route::get('o-nama-brisanje-slike', ['as' => 'admin-about-us-image-delete', 'uses' => 'AdminController@deleteAboutUsImage']);

		Route::post('korisnici', ['as' => 'admin-usersPOST', 'uses' => 'AdminController@addUser']);
		Route::get('korisnici', ['as' => 'admin-users', 'uses' => 'AdminController@showUsers']);
		Route::post('korisnici-izmjena', ['as' => 'admin-users-editPOST', 'uses' => 'AdminController@updateUser']);
		Route::get('korisnici-izmjena/{id}', ['as' => 'admin-users-edit', 'uses' => 'AdminController@showUpdateUser'])->where(['id' => '[0-9]+']);
		Route::get('korisnici-brisanje/{id}', ['as' => 'admin-users-delete', 'uses' => 'AdminController@deleteUser'])->where(['id' => '[0-9]+']);

		Route::post('kritike', ['as' => 'admin-testemonialsPOST', 'uses' => 'AdminController@addTestemonial']);
		Route::get('kritike', ['as' => 'admin-testemonials', 'uses' => 'AdminController@showTestemonials']);
		Route::get('kritike-brisanje/{id}', ['as' => 'admin-testemonial-delete', 'uses' => 'AdminController@deleteTestemonial'])->where(['id' => '[0-9]+']);

		Route::post('video-galerija', ['as' => 'admin-video-galleryPOST', 'uses' => 'AdminController@updateVideoGallery']);
		Route::get('video-galerija', ['as' => 'admin-video-gallery', 'uses' => 'AdminController@showVideoGallery']);
		Route::get('video-galerija-brisanje', ['as' => 'admin-video-gallery-delete', 'uses' => 'AdminController@deleteVideoGalleryUrl']);

		Route::post('galerija', ['as' => 'admin-image-galleryPOST', 'uses' => 'AdminController@updateImageGallery']);
		Route::get('galerija', ['as' => 'admin-image-gallery', 'uses' => 'AdminController@showImageGallery']);
		Route::get('galerija-brisanje-slike/{id}', ['as' => 'admin-image-gallery-image-delete', 'uses' => 'AdminController@deleteImageGalleryImage']);
	});
});

/**
 * logout from admin area
 */
Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

/**
 * public area
 */
Route::post('prijava', ['as' => 'loginPost', 'uses' => 'LoginController@checkLogin']);
Route::get('prijava', ['as' => 'login', 'uses' => 'LoginController@showLogin']);

Route::post('kontakt', ['as' => 'kontaktPost', 'uses' => 'PublicController@sendMail']);
Route::get('kontakt', ['as' => 'contact', 'uses' => 'PublicController@showContact']);

Route::get('en', ['as' => 'homeEng', 'uses' => 'PublicController@showHomeEng']);
Route::get('/', ['as' => 'home', 'uses' => 'PublicController@showHome']);
