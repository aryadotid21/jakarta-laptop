<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Laptop;
use App\Models\Order;
use App\Models\Question;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user()
    {
        return view('welcome');
        }
    public function admin()
    {   
        $user = User::all();
        $order = Order::all();
        $laptop = Laptop::all();
        $question = Question::all();
        return view('admin.home',compact('order','user','laptop','question'));
       
    }
    public function technician()
    {

        $user = User::all();
        $order = Order::all();
        $laptop = Laptop::all();
        $question = Question::all();
        return view('technician.home',compact('order','user','laptop','question'));
    }
}
