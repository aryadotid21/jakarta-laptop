<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Laptop;
use Illuminate\Support\Facades\Hash;
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

Auth::routes();


Route::group(['middleware'=>'user'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.dashboard');
    Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('user.order.view');
    Route::post('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('user.order.proccess');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
});

Route::group(['prefix'=>'technician','middleware'=>'technician'],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('technician.dashboard');
});

Route::get('/test',function(){
//     $data = User::create([
//         'name'=>'Muhammad Arya Dyas',
//         'role_id'=>2,
//         'email'=>'arya@gmail.com',
//         'password'=>Hash::make('40264026'),
//   ]);
    echo(User::find(3)->laptop);
});