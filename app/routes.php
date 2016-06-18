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
		return Redirect::to('admin/pocetna');
	});

	Route::group(['prefix' => 'admin'], function() {
		Route::get('pocetna', ['as' => 'admin', 'uses' => 'AdminController@showHome']);

		Route::post('o-nama', ['as' => 'admin-about-usPOST', 'uses' => 'AdminController@updateAboutUs']);
		Route::get('o-nama', ['as' => 'admin-about-us', 'uses' => 'AdminController@showAboutUs']);
		Route::get('o-nama-brisanje-slike', ['as' => 'admin-about-us-image-delete', 'uses' => 'AdminController@deleteAboutUsImage']);

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

Route::get('galerija', ['as' => 'gallery', 'uses' => 'PublicController@showGallery']);
Route::get('o-nama', ['as' => 'about-us', 'uses' => 'PublicController@showAboutUs']);

Route::post('kontakt', ['as' => 'kontaktPost', 'uses' => 'PublicController@sendMail']);
Route::get('kontakt', ['as' => 'contact', 'uses' => 'PublicController@showContact']);

Route::get('info', ['as' => 'info', 'uses' => 'PublicController@showInfo']);
Route::get('/', ['as' => 'home', 'uses' => 'PublicController@showHome']);
