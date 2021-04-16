<?php

use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

JsonApi::register('v1')->routes(function ($api) {
    $api->resource('employees')->relationships(function ($relations) {
        $relations->hasMany('departments');
        $relations->hasMany('managers');
        $relations->hasMany('salaries');
        $relations->hasMany('titles');
        $relations->hasOne('salary');
        $relations->hasOne('title');
    });

    $api->resource('departments')->relationships(function ($relations) {
        $relations->hasMany('employees');
        $relations->hasMany('managers');
    });

    $api->resource('salaries')->relationships(function ($relations) {
        $relations->hasOne('employee');
    });

    $api->resource('titles')->relationships(function ($relations) {
        $relations->hasOne('employee');
    });
});
