<?php

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
//Vistas//
//registro principal//
Route::get('/', function () {
    return view('login.register');
});
//error en el rfc//
Route::get('error', function () {
    return view('login.error');
});
//accceso de administrador//
Route::get('admin', function () {
    return view('login.sesion');
});
//acceso de comensal//
Route::get('sesion', function () {
    return view('login.sesioncomensal');
});
//error comensal//
Route::get('sesionerror', function () {
    return view('login.errorcomensal');
});
//error admin//
Route::get('erroradmin', function () {
    return view('login.errorsesion');
});

//Reservación comensal//
Route::get('bienvenida', function () {
    return view('comensal.comensal');
});
//administracion//
Route::get('bienvenida2', function () {
    return view('administrador.administrador');
});

//master//
Route::get('master', function () {
    return view('master');
});
//Validación de usuario administrador//
Route::get('validar','App\Http\Controllers\AccesoController@validar'); 
//Validación de comensal//
Route::get('validarcomensal','App\Http\Controllers\AccesoComensalController@validar'); 
//Cerrar sesión//
Route::get('salir','App\Http\Controllers\AccesoController@salir');


//Apis//
Route::apiResource('apiPersonal', 'App\Http\Controllers\ApiUsuariosController');
Route::apiResource('apiComensal', 'App\Http\Controllers\ApiComensalesController');
Route::apiResource('apiMesa', 'App\Http\Controllers\ApiMesasController');
Route::apiResource('apiReservacion', 'App\Http\Controllers\ApiReservacionesController');
Route::apiResource('apiRestaurante', 'App\Http\Controllers\ApiRestaurantesController');
Route::apiResource('apiUbicacion', 'App\Http\Controllers\ApiUbicacionesController');
