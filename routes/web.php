<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::post('contact', 'ContactController@store')->name('contact.store');

// Post
Route::get('blog', 'PostController@index')->name('post.index');
Route::get('post/{slug}', 'PostController@show')->name('post.show');
Route::post('post/{slug}', 'PostFavouriteController@store')
    ->name('post.favourite.store')
    ->middleware('auth');

// Comment
Route::post('post/{slug}/comment', 'PostCommentController@store')
    ->name('post.comment.store')
    ->middleware('auth');

Route::post('comment/{comment}', 'CommentFavouriteController@store')
    ->name('comment.favourite.store')
    ->middleware('auth');

// Subscription
Route::post('subscription', 'SubscriptionController@store')
    ->name('subscription.store');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');
Route::post('register', 'Auth\RegisterController@register')
    ->name('register.store');

// Socialite (Github)
Route::get('auth/github', 'Auth\LoginController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\LoginController@handleProviderCallback');

// Profile
Route::get('profile/{profile}', 'ProfileController@show')
    ->name('profile.show')
    ->middleware('can:profile.show,profile');

Route::get('sms', 'SmsController@index')
    ->name('sms.index')
    ->middleware('can:sms.index');
Route::post('sms', 'SmsController@store')
    ->name('sms.store')
    ->middleware('can:sms.store');
