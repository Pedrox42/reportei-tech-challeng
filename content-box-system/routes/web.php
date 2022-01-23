<?php

use App\Http\Controllers\ContentBoxController;
use App\Http\Controllers\FileController;
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

Route::middleware('auth')->group(function (){
    //Rotas do minha conta
    Route::prefix('minha-conta')->group(function (){
        Route::get('/editar-perfil', [App\Http\Controllers\UserController::class, 'editProfile'])->name('editar-perfil');
        Route::post('/salvar-perfil', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('salvar-perfil');
    });
    //Rotas das content-boxes
    Route::prefix('/content-boxes')->group(function (){
        Route::resource('content-box', ContentBoxController::class);
        Route::get('/download/{file}', [App\Http\Controllers\ContentBoxController::class, 'downloadFile'])->name('download-file');
        Route::resource('file', FileController::class)->only('destroy');
    });
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
