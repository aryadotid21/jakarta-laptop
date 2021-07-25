<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Laptop;
use Auth;
use Alert;
class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        $laptop = Laptop::all();
        return view('technician.data.laptop.index',compact('laptop','brand'));
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
    public function edit($laptop)
    {
        $data = Laptop::find($laptop);
        return view('technician.data.laptop.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToHold(Request $request, $laptop)
    {
        $data = Laptop::findOrFail($laptop);
        if($data->update([
            'status'=>'Hold',
            'user_id'=>Auth::user()->id,
        ]
        )){
            Alert::success('Sukses merubah data','Data berhasil di ubah');
            return back();
        } else{
            Alert::error('Error saat merubah data', 'Data tidak dirubah');
            return back();
        }
    }
    
    public function update(Request $request, $laptop)
    {
        $data = Laptop::findOrFail($laptop);
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
    public function destroy($id)
    {
        //
    }
}
