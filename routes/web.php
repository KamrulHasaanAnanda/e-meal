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
Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.user_edit');
Route::post('/admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update_user');
Route::get('/admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.user_delete');

//manager
Route::get('/manager/meal-system', [App\Http\Controllers\ManagerController::class, 'meal_system'])->name('manager.mealSystem');
Route::post('/manager/store_meal_system', [App\Http\Controllers\ManagerController::class, 'store_meal_system'])->name('manager.store_meal_system');
Route::post('/manager/meal/assign/{id}', [App\Http\Controllers\ManagerController::class, 'meal_assign'])->name('manager.meal_assign');
Route::get('/manager/meal/update/{id}', [App\Http\Controllers\ManagerController::class, 'meal_update'])->name('manager.meal_update');
Route::get('/manager/meal/stop/{id}', [App\Http\Controllers\ManagerController::class, 'delete_meal_system'])->name('manager.meal_stop');

//meals
Route::get('/manager/meals', [App\Http\Controllers\MealsController::class, 'index'])->name('manager.meal');
Route::get('/manager/meals/add', [App\Http\Controllers\MealsController::class, 'add_meal'])->name('manager.meal_add');
Route::post('/manager/meal/store', [App\Http\Controllers\MealsController::class, 'store_meal'])->name('manager.store_meal');
Route::get('/manager/meal/edit/{id}', [App\Http\Controllers\MealsController::class, 'edit'])->name('manager.meal_edit');
Route::post('/manager/meal/update/{id}', [App\Http\Controllers\MealsController::class, 'update'])->name('manager.update_meal');
Route::get('/manager/meal/delete/{id}', [App\Http\Controllers\MealsController::class, 'deleteMeal'])->name('manager.meal_delete');

//message
Route::get('/message/send/{id}', [App\Http\Controllers\MessageController::class, 'message_view'])->name('message.message_view');
Route::post('/manager/meal/store/', [App\Http\Controllers\MessageController::class, 'store_message'])->name('message.store_message');












