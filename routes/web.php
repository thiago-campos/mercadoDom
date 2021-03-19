<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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
    Alert::success('Bem-vindo!', 'MercadoDom');
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('produto', ProdutoController::class)->middleware('auth');
Route::get('/produto/destroy/{id}', [ProdutoController::class, 'destroy']);
// Route::get('/produto/destroy/{id}', function(){
//     Alert::question('Are you sure?','You won\'t be able to revert this!');
//     return action([ProdutoController::class, 'destroy']);
// });
