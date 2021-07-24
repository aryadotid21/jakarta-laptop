<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Laptop;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaptopController;
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

Route::group(['middleware'=>'user','as'=>'user.'],function(){
    Route::get('/home', [HomeController::class, 'user'])->name('dashboard');
    Route::get('/history', [OrderController::class, 'OrderHistory'])->name('order.history');
    Route::get('/order', [OrderController::class, 'OrderView'])->name('order.view');
    Route::post('/order', [OrderController::class, 'OrderProccess'])->name('order.proccess');
});

Route::group(['prefix'=>'admin','middleware'=>'admin','as'=>'admin.'],function(){
    Route::get('/', [HomeController::class, 'admin'])->name('dashboard');

    Route::group(['prefix'=>'user','as'=>'user.'],function(){
        Route::get('/all', [UserController::class, 'all'])->name('all');
        Route::get('/admin', [UserController::class, 'admin'])->name('admin');
        Route::get('/technician', [UserController::class, 'technician'])->name('technician');
        Route::get('/roles', [UserController::class, 'roles'])->name('roles');
    });
    Route::resource('user', UserController::class);

    Route::group(['prefix'=>'order','as'=>'order.'],function(){
        Route::get('/new', [OrderController::class, 'new'])->name('new');
        Route::get('/finished', [OrderController::class, 'finished'])->name('finished');
    });
    Route::resource('order', OrderController::class);


    Route::group(['prefix'=>'laptop','as'=>'laptop.'],function(){
        Route::get('/ready', [LaptopController::class, 'ready'])->name('ready');
        Route::get('/process', [LaptopController::class, 'process'])->name('process');
        Route::get('/hold', [LaptopController::class, 'hold'])->name('hold');
    });
    Route::resource('laptop', LaptopController::class);
    Route::resource('question', QuestionController::class);

});

Route::group(['prefix'=>'technician','middleware'=>'technician','as'=>'technician.'],function(){
    Route::get('/', [HomeController::class, 'technician'])->name('dashboard');
    Route::resource('order', OrderController::class);
    Route::resource('user', UserController::class);
    Route::resource('laptop', LaptopController::class);
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