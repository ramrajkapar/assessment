<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileHandlerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JsonToExcelController;
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

Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::get('/login/github', [LoginController::class, 'redirectToGithub'])->name('github.login');
Route::get('/login/github/callback', [LoginController::class, 'handleGithubCallback']);

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('json-file', [FileHandlerController::class, 'jsonFileUploader'])->name('admin.json.file');
    Route::get('excel/list', [FileHandlerController::class, 'getExcelFileList'])->name('admin.excel.file');

    Route::get('download/json/{filename}', [FileHandlerController::class, 'downloadJsonFile'])->name('admin.download.jsonfile');
    Route::get('download/excel/{filename?}', [FileHandlerController::class, 'downloadExcelFile'])->name('admin.download.excelfile');

    Route::post('json-file', [JsonToExcelController::class, 'convert'])->name('admin.json.file.post');

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});
