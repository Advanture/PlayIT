<?php

use Illuminate\Support\Facades\Route;

# Vk authorization
Route::group(['prefix' => 'auth'], function () {
    Route::get('vk', 'VkAuthController@redirectToProvider')
        ->name('auth.vk');
    Route::get('vk/callback', 'VkAuthController@handleProviderCallback')
        ->name('auth.vk.callback');

    Route::post('logout', 'VkAuthController@logout')->name('logout');
});

# For guests
Route::group(['middleware' => 'guest'], function () {
    Route::view('welcome', 'welcome')->name('welcome');
});

# For authorized users
Route::group(['middleware' => 'auth:api'], function () {
    Route::group([
        'prefix'    => 'fortune',
        'as'        => 'fortune.'
    ], function () {
        Route::get('/', 'FortuneController@index')->name('index');
        Route::get('start', 'FortuneController@start')->name('start');
        //Route::get('start', 'FortuneController@startRedirect')->name('start.redirect');
    });

    Route::group([
        'prefix'    => 'shop',
        'as'        => 'shop.'
    ], function () {
        Route::get('/', 'ShopController@index')->name('index');
        Route::get('buy/{product}', 'ShopController@buy')->name('buy');
    });

    Route::get('news', 'NewsController@index')->name('news');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::get('profile/test', 'ProfileController@test')->name('profile');
    Route::post('promocode', 'ProfileController@promocode')->name('promocode.use');

    Route::get('rating', 'RatingController@index')->name('rating');

    Route::get('missions', 'TaskController@index')->name('missions');

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('tasks', 'TaskController');

    Route::get('history', 'ProfileController@coinsHistory');

    Route::get('hotline-bruevich', 'GameController@index')->name('game');
    Route::post('hotline-bruevich', 'GameController@earn')->name('game.over');
});

Route::get('test', function () {
    auth()->user()->assignRole('admin');
});
