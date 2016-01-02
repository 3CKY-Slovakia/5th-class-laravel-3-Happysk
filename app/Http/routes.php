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

/**
 * HOME
 */
use App\Article;
use App\Tag;

/**
 * HomePage
 **/
Route::get('home', 'ArticlesController@index');
Route::get('/', 'ArticlesController@index');



/**
 * BLOG
 */
Route::group(['prefix' => 'blog-post'], function () {
    Route::get('/{id}', function () {
        return view('blog-post');
        });
	});
Route::get('bloggers', [
    'as' => 'bloggers',
    'uses' => 'Auth\AuthController@showBloggers'] );

/**
 * AUTH
 */
Route::group(['prefix' => 'auth'], function () {
    // Authentication routes...
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    // Password reset link request routes...
    Route::get('/{id}', function(){ return view('auth/password'); });
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');

    // Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
});

/**
 * ARTICLES
 */
Route::group(['prefix' => 'article'], function () {
    Route::get('/', 'ArticlesController@index');
    Route::get('show/{id}', [
	    'as' => 'article.show',
	    'uses' => 'ArticlesController@show'
    ]);
	Route::get('create', 'ArticlesController@create');
    Route::get('edit/{id}', 'ArticlesController@edit');
	Route::get('delete/{id}', 'ArticlesController@destroy');

    Route::post('store', 'ArticlesController@store');
    Route::post('update/{id}', 'ArticlesController@update');
});
 // Comments
	Route::post('comment/store',
		['as' => 'comment.store',
		 'uses'=>'CommentsController@store']);

// Contact
Route::post('contact', 'ContactController@store');




