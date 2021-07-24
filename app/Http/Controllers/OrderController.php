<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Order;
use App\Models\User;
Use Alert;
Use Auth;
Use Mail;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laptop = Laptop::all();
        $user = User::all();
        $data = Order::all();
        return view('admin.data.order.all',compact('data','laptop','user'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $laptop = Laptop::all();
        $user = User::all();
        $data = Order::all();
        return view('admin.data.order.new',compact('data','laptop','user'));
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finished()
    {
        $laptop = Laptop::all();
        $user = User::all();
        $data = Order::all();
        return view('admin.data.order.finished',compact('data','laptop','user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        $update = Laptop::findOrFail($request->laptop_id);
        $update->update([
             'user_id'=> $request->user_id,
             'status'=>'On Process'
         ]);
        if($order&&$update){
            Alert::success('Pemesanan Sukses', 'Silahkan periksa email anda untuk langkah selanjutnya'.', Email : '.Auth::user()->email);
            $details = $order;
            Mail::to(Auth::user()->email)->send(new \App\Mail\Mailer($details));
            return back();
        } else {
            Alert::error('Error saat menambah data', 'Data tidak ditambah');
            return back();
        }
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order)
    {
        $user = User::all();
        $laptop = Laptop::all();
        $data = Order::find($order);
        return view('admin.data.order.edit',compact('data','user','laptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order)
    {
        $data = Order::findOrFail($order);
        if($data->update($request->all())){
            Alert::success('Sukses merubah data','Data berhasil di ubah');
            return back();
        } else{
            Alert::error('Error saat merubah data', 'Data tidak dirubah');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order)
    {
        $delete = Order::destroy($order);
        if($delete){
            Alert::success('Berhasil menghapus data');
            return back();
        } else {
            Alert::error('Error saat menghapus data', 'Data tidak dihapus');
            return back();
        }
    }

    /**
     * Displaying order form
     *
     * @return \Illuminate\Http\Response
     */
    public function OrderHistory()
    {
        $data_laptop = Order::all()->sortByDesc('id')->where('user_id',3);
        return view('user.order.history',compact("data_laptop"));
    } 

    public function OrderView()
    {
        $data_laptop = Laptop::all();
        return view('user.order.view',compact("data_laptop"));
    } 
    
    public function OrderProccess(Request $request)
    {
        $order = Order::create([
            'user_id'=>$request->user_id,
            'laptop_id'=>$request->laptop_id,
            'kota'=> $request->kota,
            'kecamatan'=> $request->kecamatan,
            'kode_pos'=>$request->kode_pos,
            'alamat'=>$request->alamat,
            'duration'=>$request->duration,
            'total_price'=>str_replace(["Rp"," ",".",","], "", $request->total_price),
            'pickup_date'=>$request->pickup_date,
            'status'=>"On Process",
        ]);
         $update = Laptop::findOrFail($request->laptop_id);
         $update->update([
             'user_id'=> $request->user_id,
             'status'=>'On Process'
         ]);
        if($order&&$update){
            Alert::success('Pemesanan Sukses', 'Silahkan periksa email anda untuk langkah selanjutnya'.', Email : '.Auth::user()->email);
            $details = $order;
            Mail::to(Auth::user()->email)->send(new \App\Mail\Mailer($details));
            return redirect(route('index'));
        } else {
            Alert::error('Error saat menambah data', 'Data tidak ditambah');
            return back();
        }
    }
}
