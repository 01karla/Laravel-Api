<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jsController;
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

    Route::get('/', function () {
        return view('welcome');
    });
    //---------------------------------RUTA PRINCIPAL------------------------------
    route::get('/principal',[jsController::class,'principal'])->name('principal');
    route::get('/login',[jsController::class,'login'])->name('login');
    route::get('/logoun',[jsController::class,'logoun'])->name('logoun');
    route::get('/Graficos',[jsController::class,'Graficos'])->name('Graficos');

    //---------------------------------RUTAS DE ADMINISTRADORES---------------------

    //---------------------------------RUTA DE ALTAS--------------------------------
    route::get('/AdminAlta',[jsController::class,'AdminAlta'])->name('AdminAlta');
    route::post('/guardar',[jsController::class,'guardar'])->name('guardar');
    //---------------------------------RUTA DE MOSTRAR TODOS LOS REGISTROS ---------
    route::get('/AdminRegistros',[jsController::class,'AdminRegistros'])->name('AdminRegistros');
    route::get('/consulta',[jsController::class,'consulta'])->name('consuta');
    Route::get('/admin/{id_admin}', [AdminController::class, 'showAdminDetail'])->name('AdminDetallle');
    route::get('/AdminDetalle/{id_admin}',[jsController::class,'AdminDetalle'])->name('AdminDetalle');
    //--------------------------RUTA BORRAR
    route::get('/borrar/{id_admin}',[jsController::class,'borrar'])->name('borrar');
    //--------------------------RUTA MODIFICAR
    Route::get('/modificar/{id_admin}', [jsController::class, 'mostrarModificar'])->name('mostrar_modificar');

    Route::put('/registros/{id_admin}', [jsController::class, 'modificar'])->name('modificar');

    //---------------------------------RUTAS DE ABECEDARIO-----------------------------------

    //---------------------------------RUTA DE ALTA DE ABECEDARIO----------------------------
    route::get('/AbcAlta',[jsController::class,'AbcAlta'])->name('AbcAlta');
    route::post('/Abcguardar',[jsController::class,'Abcguardar'])->name('Abcguardar');
    //---------------------------------RUTA DE MOSTRAR TODOS LOS REGISTROS ---------
    route::get('/AbcRegistros',[jsController::class,'AbcRegistros'])->name('AbcRegistros');
    route::get('/consultaAbc',[jsController::class,'consultaAbc'])->name('consutaAbc');
    route::get('/AbcRegistrosUsua',[jsController::class,'AbcRegistrosUsua'])->name('AbcRegistrosUsua');
    route::get('/Abcbuscar',[jsController::class,'Abcbuscar'])->name('Abcbuscar');
    route::get('/AbcDetalle/{id_abecedario}',[jsController::class,'AbcDetalle'])->name('AbcDetalle');
    //--------------------------RUTA BORRAR
    route::get('/Abcborrar/{id_abecedario}',[jsController::class,'Abcborrar'])->name('Abcborrar');
    //--------------------------RUTA MODIFICAR
    Route::get('/modi/{id_abecedario}', [jsController::class, 'AbcmostrarModificar'])->name('Abcmostrar_Modificar');
    Route::put('/registros/{id_abecedario}', [jsController::class, 'modi'])->name('modi');
