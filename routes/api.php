<?php

use App\Http\Controllers\Api\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('/', function(){
    echo '<h2>Teste para Avaliação JN2<h2>';
});

Route::post('/cliente',[ClienteController::class, 'store'])->name('cadastrar-cliente');
Route::get('/cliente/{id}',[ClienteController::class, 'show'])->name('listar-cliente');
Route::put('/cliente/{id}',[ClienteController::class, 'update'])->name('editar-cliente');
Route::delete('/cliente/{id}',[ClienteController::class, 'destroy'])->name('deletar-cliente');
Route::get('/consulta/final-placa/{numero}',[ClienteController::class, 'consultarPlaca'])->name('final-placa');
