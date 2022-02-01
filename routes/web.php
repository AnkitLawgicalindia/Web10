<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\workController;
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

Route::get('/', [workController::class,'index'])->name('index');
Route::get('/about',[workController::class,'about'])->name('about');
Route::get('/contact',[workController::class,'contact'])->name('contact');
Route::post('mail',[workController::class,'mail'])->name('mail');
Route::get('mails',[workController::class,'show_mail'])->name('show_mail');
Route::get('/delete_mail{id}',[workController::class,'delete_mail'])->name('delete_mail');
Route::get('/admin',[workController::class,'admin'])->name('admin');


Route::get('add_product',[workController::class,'add_product'])->name('add_product');
Route::post('add_product',[workController::class,'save_product'])->name('save_product');
Route::get('product',[workController::class,'product'])->name('product');
Route::get('delete_product{id}',[workController::class,'delete_product'])->name('delete_product');
Route::get('edit_product{id}',[workController::class,'edit_product'])->name('edit_product');
Route::post('edit_product{id}',[workController::class,'update_product'])->name('update_product');


Route::get('add_category',[workController::class,'add_category'])->name('add_category');
Route::post('add_category',[workController::class,'save_category'])->name('save_category');
Route::get('category',[workController::class,'category'])->name('category');
Route::get('delete_category{id}',[workController::class,'delete_category'])->name('delete_category');
Route::get('edit_category{id}',[workController::class,'edit_category'])->name('edit_category');
Route::post('edit_category{id}',[workController::class,'update_category'])->name('update_category');

Route::get('add_designs',[workController::class,'add_designs'])->name('add_designs');
Route::post('save_designs',[workController::class,'save_designs'])->name('save_designs');
Route::get('designs',[workController::class,'designs'])->name('designs');
Route::get('delete_designs{id}',[workController::class,'delete_designs'])->name('delete_design');

Route::get('add_customer',[workController::class,'add_customer'])->name('add_customer');
Route::post('save_customer',[workController::class,'save_customer'])->name('save_customer');
Route::get('/product_customer{id}',[workController::class,'customer_product2'])->name('user.customer_product');
Route::get('/customers',[workController::class,'show_customer'])->name('customers');
Route::get('delete_customer{id}',[workController::class,'delete_customer'])->name('delete_customer');



Route::get('requirement{id}',[workController::class,'customer_requirement'])->name('customer_requirement');
Route::get('/show_customer_requirement',[workController::class,'show_customer_requirement'])->name('show_customer_requirement');
Route::get('/delete_customer_requirement/{id}',[workController::class,'delete_customer_requirement'])->name('delete_customer_requirement');
Route::get('/status_customer_requirement/{id}',[workController::class,'status_customer_requirement'])->name('status_customer_requirement');
Route::post('save_customer_requirement{id}',[workController::class,'save_customer_requirement'])->name('save_customer_requirement');


Route::get('add_customer_product',[workController::class,'add_customer_product'])->name('add_customer_product');
Route::post('save_customer_product',[workController::class,'save_customer_product'])->name('save_customer_product');
Route::get('/customer_products',[workController::class,'customer_product'])->name('customer_product');
Route::get('delete_customer_product/{id}',[workController::class,'delete_customer_product'])->name('delete_customer_product');

Route::get('add_delivery',[workController::class,'add_delivery'])->name('add_delivery');
Route::post('save_delivery',[workController::class,'save_delivery'])->name('save_delivery');
Route::get('edit_delivery{id}',[workController::class,'edit_delivery'])->name('edit_delivery');
Route::post('update_delivery{id}',[workController::class,'update_delivery'])->name('update_delivery');
Route::get('delivery',[workController::class,'delivery'])->name('delivery');
Route::get('delete_delivery/{id}',[workController::class,'delete_delivery'])->name('delete_delivery');

Route::get('/cat{id}',[workController::class,'show_category'])->name('show_category');
Route::get('/pro{id}',[workController::class,'show_product'])->name('show_product');
Route::post('/login2',[workController::class,'login'])->name('login');
Route::get('/logout',[workController::class,'logout'])->name('logout');


Route::view('message','message')->name('customer.message');