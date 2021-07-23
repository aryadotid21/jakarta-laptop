<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Laptop;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestionController;
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
})->name('index');

Auth::routes();

Route::resource('question', QuestionController::class);

Route::group(['middleware'=>'user'],function(){
    Route::get('/home', [HomeController::class, 'user'])->name('user.dashboard');
    Route::get('/history', [OrderController::class, 'OrderHistory'])->name('user.order.history');
    Route::get('/order', [OrderController::class, 'OrderView'])->name('user.order.view');
    Route::post('/order', [OrderController::class, 'OrderProccess'])->name('user.order.proccess');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/', [HomeController::class, 'admin'])->name('admin.dashboard');
    Route::resource('order', OrderController::class);
});

Route::group(['prefix'=>'technician','middleware'=>'technician'],function(){
    Route::get('/', [HomeController::class, 'technician'])->name('technician.dashboard');
});

// Route::get('/test',function(){
// //     $data = User::create([
// //         'name'=>'Muhammad Arya Dyas',
// //         'role_id'=>2,
// //         'email'=>'arya@gmail.com',
// //         'password'=>Hash::make('40264026'),
// //   ]);
//     echo(User::find(3)->laptop);
//     // echo str_replace(["Rp"," ",".",","], "", "Rp500.000");
// });

// Route::get('/mailer',function(){
//     $details = [
//         'title' => 'This email for testing porpouse',
//         'body' => 'Testing email using smtp'
//     ];
//     Mail::to(Auth::user()->email)->send(new \App\Mail\Mailer($details));
//     echo "Email sended";
// });