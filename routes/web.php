<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\InvoiceController;

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
})->middleware('auth');


// Route::get('/usuario', function () {
// return "Hola desde la ruta usuario";
// });

// use App\Http\Controllers\PersonaController;

Route::get('/usuario/{nombre_usuario?}', [PersonaController::class ,'mostrar'])->where('nombre_usuario', '[A-Za-z]+');

Route::get('/products', [ProductController::class, 'show']);

Route::get('/brands', [BrandController::class, 'show']);

//-------------------------------------------------------------------------------------

Route::get('/category', [CategoriController::class, 'show']);

Route::get('/category/form/{id?}',[CategoriController::class, 'form'])->name('categori.form');

Route::get('/category/delete/{id}', [CategoriController::class, 'delete'])->name('categori.delete');

Route::post('/category/save', [CategoriController::class, 'save'])->name('categori.save');

//----------------------------------------------------------------------------------------


Route::get('/product/form/{id?}',[ProductController::class, 'form'])->name('product.form');

Route::get('/brand/form/{id?}',[BrandController::class, 'form'])->name('brand.form');

Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');

Route::post('/brand/save', [BrandController::class, 'save'])->name('brand.save');

Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
//-------------------------------------------------------------------------------------//

Route::get('/invoices',[InvoiceController::class, 'show']);
Route::get('/invoice/form',[InvoiceController::class, 'form'])->name('invoice.form');

//---------------------------------------------------------------------------------------//
//Route::resource('invoice',InvoiceController);
/*
get/invoice->index
get/invoice/create->create
post/invoice->store
get/invoice/{invoice}->show
get/invoice{invoice}edit->edit
put/path/invoice/{invoice}->update
delete/invoice/{invoice}->destroy 
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/categories', [App\Http\Controllers\categori::class, 'index'])->name('Categories');
