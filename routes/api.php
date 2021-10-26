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

Route::get('/slack-invite', function () {
    return response()->json([
        'url' => 'https://join.slack.com/t/larasurf/shared_invite/zt-x9cn1z4m-lh1cQlk29Gp7HWljj3cBrQ',
    ]);
});

// AWS Health Check Route
Route::get('/healthcheck', function () {
    return response()->noContent(\Illuminate\Http\Response::HTTP_OK);
});
