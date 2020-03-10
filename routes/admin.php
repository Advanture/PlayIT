<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'prefix'        => 'manager',
    'middleware'    => 'role:admin',
    'namespace'     => 'Manager',
    'as'            => 'manager.'
], function () {
    Route::get('/', 'SearchController@index')->name('index');
    Route::post('/', 'SearchController@search')->name('search');

    Route::put('maintenance', 'MaintenanceController@switchMode')->name('maintenance');

    Route::group(['prefix' => 'users/{user}'], function () {
        Route::get('/', 'UserController@index')->name('user');

        Route::put('ban', 'UserController@ban')->name('user.ban');
        Route::put('role', 'UserController@editRole')->name('user.edit_role');
    });
});

Route::group([
    'prefix'        => 'moderator',
    'middleware'    => 'permission:moder.access',
    'namespace'     => 'Moderator',
    'as'            => 'moder.'
], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::post('promocode', 'PromocodeController@generate')->name('promocode.generate');
    Route::post('task-achievement', 'TaskAchievementController@achievement')->name('task.achievement');
    Route::post('add-coins', 'UserController@addCoins')->name('add_coins');
    Route::put('orders/{order}', 'ProductController@update')->name('orders');
});

Route::group([
    'prefix'        => 'smm',
    'middleware'    => 'permission:smm.access',
    'namespace'     => 'Smm',
    'as'            => 'smm.'
], function () {
    Route::resource('news', 'NewsController')
        ->only([
        'index', 'store', 'destroy'
    ]);
});
