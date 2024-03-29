<?php

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

// AWS Health Check Route
Route::get('/healthcheck', function () {
    return response()->noContent(\Illuminate\Http\Response::HTTP_OK);
});
