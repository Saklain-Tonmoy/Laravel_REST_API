<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;

Route::apiResource('/class', ClassesController::class);
Route::apiResource('/message', TestController::class);
Route::apiResource('/subject', SubjectController::class);
Route::apiResource('/student', StudentController::class);

Route::group([

    //'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});