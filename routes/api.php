<?php

use Illuminate\Support\Facades\Route;

Route::post('bot/add-coins', 'TestBotController@userAddCoins');
Route::post('clicker', 'TestBotController@userWinsClicker');
Route::post('id-by-token', 'TestBotController@getIdByAppToken');
Route::post('complete-task', 'TestBotController@completeTask');

Route::post('promocode', 'TestBotController@promocode')->middleware('auth:api');
