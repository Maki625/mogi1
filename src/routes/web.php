<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\ProfileController;



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

//商品一覧画面
Route::get('/', [ItemController::class, 'index']);

//商品出品画面
Route::get('/sell', [ExhibitionController::class, 'create']);

//商品出品処理
Route::post('/sell', [ExhibitionController::class, 'store']);

//プロフィール編集画面
Route::get('/mypage/profile', [ProfileController::class, 'edit']);

//プロフィール更新処理
Route::put('/mypage/profile', [ProfileController::class, 'update']);
