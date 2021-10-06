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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Auth::routes();
// App\Http\Controllers\Auth\LoginController@showLoginForm

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin
Route::get('/admin/add', [App\Http\Controllers\AdminController::class, 'add_user'])->name('admin.add_user');
Route::get('/admin/userList', [App\Http\Controllers\AdminController::class, 'userList'])->name('admin.userList');

Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store_user'])->name('admin.store_user');
Route::post('/admin/store', [App\Http\Controllers\AdminController::class, 'store_user'])->name('admin.store_user');
Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.user_edit');
Route::post('/admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update_user');
Route::get('/admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.user_delete');






