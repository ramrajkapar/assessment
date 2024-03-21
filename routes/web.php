<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('github_page');
});

Route::get('/login/github', [LoginController::class, 'redirectToGithub'])->name('github.login');
Route::get('/login/github/callback', [LoginController::class, 'handleGithubCallback']);
