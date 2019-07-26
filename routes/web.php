<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('lolo', function () {
    return view('personasEncuesta');
});

Route::get('resultados', 'ResultadosController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Encuesta
Route::group(['prefix' => 'encuesta'], function(){
    Route::get('personas', 'PersonasEncuestaController@index')->name('personas.index');
    Route::post('personas', 'PersonasEncuestaController@saveForm')->name('personas.saveForm');

    Route::get('practica', 'PracticaEncuestaController@index')->name('practica.index');
    Route::post('practica', 'PracticaEncuestaController@saveForm')->name('practica.saveForm');

    Route::get('procesos', 'ProcesosEncuestaController@index')->name('procesos.index');
    Route::post('procesos', 'ProcesosEncuestaController@saveForm')->name('procesos.saveForm');

    Route::get('producto', 'ProductoEncuestaController@index')->name('producto.index');
    Route::post('producto', 'ProductoEncuestaController@saveForm')->name('producto.saveForm');

    Route::get('acambio', 'aCambioEncuestaController@index')->name('acambio.index');
    Route::post('acambio', 'aCambioEncuestaController@saveForm')->name('acambio.saveForm');
});


Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


    // Password resets routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    // CRUD

    Route::resource('departamentos', 'DepartamentosController');
    Route::resource('empresa', 'EmpresaController');
    Route::resource('empleados', 'EmpleadosController');


});




