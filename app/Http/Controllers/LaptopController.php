<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Laptop;
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
        $data = Laptop::all();
        return view('admin.data.laptop.all',compact('data','brand'));
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ready()
    {
        $brand = Brand::all();
        $data = Laptop::all();
        return view('admin.data.laptop.ready',compact('data','brand'));
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function process()
    {
        $brand = Brand::all();
        $data = Laptop::all();
        return view('admin.data.laptop.process',compact('data','brand'));
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hold()
    {
        $brand = Brand::all();
        $data = Laptop::all();
        return view('admin.data.laptop.hold',compact('data','brand'));
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
        request()->validate([
            'brand_id'=>'required|max:10',
            'stock'=>'required',
        ]);
        $data=0;
        for($x = 1; $x <= $request->stock; $x++) {
            $data = Laptop::create([
                'brand_id' => $request->brand_id,
                'status' => 'Ready',
                'note' => '',
            ]);
          }
        if(!$data==0){
            Alert::success('Sukses menambah data','Data berhasil disimpan');
            return back();
        } else{
            Alert::error('Error saat menambah data', 'Data tidak disimpan');
            return back();
        // dd((int)$mass);
    } 
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
    public function destroy($laptop)
    {
        $delete = Laptop::destroy($laptop);
        if($delete){
            Alert::success('Berhasil menghapus data');
            return back();
        } else {
            Alert::error('Error saat menghapus data', 'Data tidak dihapus');
            return back();
        }
    }
}
