<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FavoriteController;




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

//商品詳細画面
Route::get('/item/{item_id}', [ItemController::class, 'show']);

//いいね登録処理
Route::post('/item/{item_id}/favorite', [FavoriteController::class, 'store']);

//いいね削除処理
Route::delete('item/{item_id}/favorite', [FavoriteController::class, 'destroy']);

//コメント送信処理
Route::post('/item/{item_id}/comment', [CommentController::class, 'store']);

//商品購入画面
Route::get('/purchase/{item_id}', [PurchaseController::class, 'show']);

//商品購入処理
Route::post('/', [PurchaseController::class,'store']);

//商品出品画面
Route::get('/sell', [ExhibitionController::class, 'create']);

//商品出品処理
Route::post('/sell', [ExhibitionController::class, 'store']);

//マイページトップ
Route::get('/mypage', [ProfileController::class, 'show']);

Route::post('/register', [RegisterController::class, 'store']);

//プロフィール編集画面
Route::get('/mypage/profile', [ProfileController::class, 'edit']);

//プロフィール更新処理
Route::put('/mypage/profile', [ProfileController::class, 'update']);

//住所変更画面
Route::get('/purchase/address/{item_id}', [AddressController::class, 'edit']);
