<?php

use App\Http\Controllers\API\ArticleApiController;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\CategoryApiController;
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

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthApiController::class, 'register']);
    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::get('articles', [ArticleApiController::class, 'index']);
    Route::get('categories/top', [CategoryApiController::class, 'topCategories']);

    Route::middleware(['jwt.verify'])->group(function () {
        Route::resource('articles', ArticleApiController::class)->only(['store', 'update', 'destroy']);
        Route::get('my-articles', [ArticleApiController::class, 'myArticles']);
        Route::post('articles/{article}/vote', [ArticleApiController::class, 'vote']);
    });

});
