<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Order;
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
    public function OrderView()
    {
        $data_laptop = Laptop::all();
        return view('user.order.view',compact("data_laptop"));
    } 
    
    public function OrderProccess(Request $request)
    {
        // dd(str_replace(["Rp"," ",".",","], "", $request->total_price));
        // echo($request->get('user_id','laptop_id','kota','kecamatan','kode_pos','alamat','duration','total_price','pickup_date','status'));
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
            'status'=>"Pending",
        ]);
         $update = Laptop::findOrFail($request->laptop_id);
         $update->update([
             'status'=>'On Process'
         ]);
        if($order&&$update){
            return response()->json([
                'success' => true,
                'message' => 'Order Success!',
                'order_details' => $order,
                'laptop_status' => $update
            ],201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register Failed!',
                'data' => ''
            ],400);
        }
    }
}
