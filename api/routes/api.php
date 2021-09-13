<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', PostController::class);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/admin/posts', App\Http\Controllers\Admin\PostController::class);
Route::post('/admin/posts', [App\Http\Controllers\Admin\PostController::class, 'store']);
Route::get('/admin/posts/{post:uuid}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit']);
Route::patch('/admin/posts/{post:uuid}', [App\Http\Controllers\Admin\PostController::class, 'update']);
