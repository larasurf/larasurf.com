<?php

use App\Http\Controllers\ContinueController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\GenerateProjectController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/docs', [DocumentationController::class, 'view'])->name('docs');

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');

Route::middleware('guest')->group(function () {
    Route::get('/continue', function () {
        return view('continue');
    })->name('continue');

    Route::get('/continue/github/redirect', [ContinueController::class, 'redirectGitHub'])->name('continue.redirect.github');
    Route::get('/continue/github/callback', [ContinueController::class, 'callbackGitHub'])->name('continue.callback.github');

});

Route::get('/generate.sh', [GenerateProjectController::class, 'generate'])->name('generate.sh');

Route::middleware('auth')->group(function () {
    Route::get('/new', function () {
        return view('new-project');
    })->name('new-project');

    Route::get('/generate', [GenerateProjectController::class, 'view'])->name('generate-project');

    Route::get('/logout', function () {
        Auth::logout();

        return redirect()->to(route('home'));
    });
});
