<?php

use Illuminate\Support\Facades\Route;

Route::post('bot/add-coins', 'TestBotController@userAddCoins');
Route::post('bot/clicker', 'TestBotController@userWinsClicker');
Route::post('id-by-token', 'TestBotController@getIdByAppToken');

Route::post('promocode', 'TestBotController@promocode')->middleware('auth:api');
