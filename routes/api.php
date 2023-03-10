<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    'visitors' => \App\Http\Controllers\VisitorController::class,
]);

//Route::post('visitors', 'App\Http\Controllers\VisitorController@store');

Route::get('statuses/update', 'App\Http\Controllers\Api\ProjectController@updateStatuses');

Route::get('projects', function () {
    return json_encode(\App\Models\Project::all());
});
