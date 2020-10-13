<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('home');
});

Auth::routes();

Route::group([
  'namespace' => 'Admin',
  'prefix' => 'admin', 'middleware' => 'auth'
], function () {

  /* Users  */

  Route::get('users', 'AdminController@show')->name('all-users');

  // Edit @users

  Route::get('users/{id}/edit', 'AdminController@edit');
  Route::post('users/{id}/edit', 'AdminController@update');

  //Delete @users

  Route::get('users/{id}/delete', 'AdminController@delete');

  /* Admin Roles Createtion */

  Route::get('roles/create', 'AdminController@create')->name('create-role');
  Route::post('roles/create', 'AdminController@store')->name('create-role');



});

/* Post Author */

Route::group([
  'namespace' => 'PostAuthor',
  'prefix' => 'post',
  'middleware' => 'post'
], function () {

  /* Show All */

  Route::get('/', 'PostCreator@index')->name('show-posts');
  /* @create */


  Route::get('create', 'PostCreator@create')->name('create-post');
  Route::post('create', 'PostCreator@store');

  Route::get('edit/{id}', 'PostCreator@show');

  Route::get('users/{id}/edit/', 'PostCreator@show');
  Route::post('users/{id}/edit/', 'PostCreator@update');

  /* Delete Page */

  Route::get('users/{id}/delete/', 'PostCreator@delete');


});