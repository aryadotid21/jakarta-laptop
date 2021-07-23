<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Order;
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
        //
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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            return response()->json([
                'success' => false,
                'message' => 'Order Failed!',
                'data' => ''
            ],400);
        }
    }
}
