<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;


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
    return view('news.list');
});
Route::get('/news/table', [NewsController::class, 'table'])->name('news.table');
Route::get('/news', [NewsController::class, 'list'])->name('news.list');
Route::match(['get','post'],'/news/create', [NewsController::class, 'create'])->name('news.create');
Route::match(['get','post'],'/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::delete('/news/delete/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
Route::post('/comment/{id}', [CommentController::class, 'create'])->name('comment.create');

