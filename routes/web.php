<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace'=> 'App\Http\Controllers\Main'], function() {
	Route::get('/','HomeController')->name('home_page');
	Route::get('/film/{film}','FilmController')->name('film_page');
	Route::get('/categories/{category}','MoviesByCategoryController')->name('movies_by_category_page');
	Route::get('/search','SearchController')->name('search');

});

Route::group(['middleware' => ['auth','admin'], 'namespace'=> 'App\Http\Controllers\Admin', 'prefix'=>'admin'], function() {
	Route::get('/', 'PanelController')->name('admin_panel');


	Route::group(['namespace'=> 'Category','prefix'=>'category'], function() {
		Route::get('/','IndexController')->name('category_index');
		Route::get('/create','CreateController')->name('category_create');
		Route::post('/store','StoreController')->name('category_store');
		Route::get('/{category}/edit','EditController')->name('category_edit');
		Route::patch('/{category}','UpdateController')->name('category_update');
		Route::delete('/{category}','DestroyController')->name('category_destroy');
	});
	Route::group(['namespace'=> 'Film','prefix'=>'film'], function() {
		Route::get('/','IndexController')->name('film_index');
		Route::get('/create','CreateController')->name('film_create');
		Route::post('/store','StoreController')->name('film_store');
		Route::get('/{film}/edit','EditController')->name('film_edit');
		Route::patch('/{film}','UpdateController')->name('film_update');
		Route::delete('/{film}','DestroyController')->name('film_destroy');

        Route::group(['namespace'=> 'Comment','prefix'=>'comment'], function() {
            Route::get('/{film}','IndexController')->name('comment_index');
            Route::delete('/{comment}','DestroyController')->name('comment_destroy');
        });
	});

	Route::group(['namespace'=> 'Genre','prefix'=>'genre'], function() {
		Route::get('/','IndexController')->name('genre_index');
		Route::get('/create','CreateController')->name('genre_create');
		Route::post('/store','StoreController')->name('genre_store');
		Route::get('/{genre}/edit','EditController')->name('genre_edit');
		Route::patch('/{genre}','UpdateController')->name('genre_update');
		Route::delete('/{genre}','DestroyController')->name('genre_destroy');
	});

	Route::group(['namespace'=> 'User','prefix'=>'user'], function() {
		Route::get('/','IndexController')->name('user_index');
		Route::get('/create','CreateController')->name('user_create');
		Route::post('/store','StoreController')->name('user_store');
		Route::get('/{user}/edit','EditController')->name('user_edit');
		Route::patch('/{user}','UpdateController')->name('user_update');
		Route::delete('/{user}','DestroyController')->name('user_destroy');
	});

	Route::fallback(function (){
		return view('admin.index');
	});
});

Route::group(['namespace' => 'App\Http\Controllers\Auth','middleware' => 'guest'], function() {
    Route::get('/vk/redirect', 'VkAuthController@redirect')->name('redirect_vk');
    Route::get('/auth/callback', 'VkAuthController@callback');
});

Auth::routes();




