<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Alert;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();
        return view('admin.data.laptop.brand.index',compact('data'));
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
        if(Brand::create($request->all())){
            Alert::success('Brand laptop baru telah ditambahkan', 'Data Berhasil ditambah');
            return back();
        } else{
            Alert::error('Gagal menambah data');
            return back();
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
    public function edit($brand)
    {
        $data = Brand::find($brand);
        return view('admin.data.laptop.brand.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand)
    {
        $data = Brand::findOrFail($brand);
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
    public function destroy($brand)
    {
        $delete = Brand::destroy($brand);
        if($delete){
            Alert::success('Berhasil menghapus data');
            return back();
        } else {
            Alert::error('Error saat menghapus data', 'Data tidak dihapus');
            return back();
        }
    }
}
