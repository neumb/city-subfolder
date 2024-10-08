<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/about', [PageController::class, 'aboutUs'])->name('pages.about');
Route::get('/news', [PageController::class, 'newsPage'])->name('pages.news');

Route::get('some-other-route', function () {
    return 'hello';
});
