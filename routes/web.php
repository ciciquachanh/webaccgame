<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WheelController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\NickController;
use App\Http\Controllers\GalleryController;

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

Route::get('/', [IndexController::class,'home']);
Route::get('/dich-vu', [IndexController::class,'dichvu'])->name('dichvu'); //tat ca dich vu thuộc game
Route::get('/dich-vu/{slug}', [IndexController::class,'dichvucon'])->name('dichvucon'); //dich vu con thuoc dich vu
Route::get('/danh-muc-game/{slug}', [IndexController::class,'danhmuc_game'])->name('danhmucgame'); //tat ca danh mục thuộc game
Route::get('/accgame/{slug}', [IndexController::class, 'acc'])->name('danhmuccon');  
Auth::routes();

Route::get('acc/{slug}/{ms}', [IndexController::class, 'detail_acc'])->name('acc.detail');
Auth::routes();

Route::get('/acc/{ms}', [\App\Http\Controllers\IndexController::class, 'detail_acc_simple'])->name('acc.detail.simple');

Route::get('/home', [HomeController::class, 'index'])->name('home');
//category
Route::resource('/category', CategoryController::class);
//slider
Route::resource('/slider', SliderController::class);
//accessories
Route::resource('/accessories', AccessoriesController::class);
//nick
Route::resource('/nick', NickController::class);
//gallery
Route::resource('/gallery', GalleryController::class);
Route::post('/choose_category', [NickController::class, 'choose_category'])->name('choose_category');