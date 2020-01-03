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
    if(Auth::check()) {
        return redirect()->route('usuarios.index');
        }
    return view('auth.login');
});



Route::group(['middleware'=>['auth']],function(){

    
    Route::resource('clientes', 'ClienteController');
    Route::resource('usuarios', 'UserController');

    Route::get('/logout',function(){
        Auth::logout();
        return view('auth.login');
    });

});

Route::get('/login', function () {
    if(Auth::check()) {
        return redirect()->route('usuarios.index');
        }
    return view('auth.login');
});
Route::post('/login', 'AuthController@postLogin')->name('login');
Route::get('/register', 'AuthController@getRegister');
Route::post('/register', 'AuthController@postRegister')->name('register');
