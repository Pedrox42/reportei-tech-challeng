<?php

use App\Http\Controllers\ContentBoxController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
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
        Route::get('/editar-perfil', [UserController::class, 'editProfile'])->name('editar-perfil');
        Route::post('/salvar-perfil', [UserController::class, 'updateProfile'])->name('salvar-perfil');
        Route::get('/adicionar-favorito/{contentBox}', [UserController::class, 'addFavorite'])->name('adicionar-favorito');
        Route::get('/remover-favorito/{contentBox}', [UserController::class, 'removeFavorite'])->name('remover-favorito');
    });
    //Rotas das content-boxes e arquivos
    Route::prefix('/content-boxes')->group(function (){
        Route::resource('content-box', ContentBoxController::class)->except('index');
        Route::get('/download/{file}', [ContentBoxController::class, 'downloadFile'])->name('download-file');
        Route::resource('file', FileController::class)->only('destroy');
        Route::get('/favoritas', [ContentBoxController::class, 'favoriteBoxes'])->name('content-box.favorites');
    });
    Route::get('/', [ContentBoxController::class, 'index'])->name('content-box.index');
});

Auth::routes();
