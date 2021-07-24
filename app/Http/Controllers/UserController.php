<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;
Use Alert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = User::all();
        $role = Role::all();
        return view('admin.data.user.all',compact('data','role'));
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $role = Role::all();
        return view('admin.data.user.user',compact('data','role'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $data = User::all();
        $role = Role::all();
        return view('admin.data.user.admin',compact('data','role'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function technician()
    {
        $data = User::all();
        $role = Role::all();
        return view('admin.data.user.technician',compact('data','role'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        $data = Role::all();
        return view('admin.data.user.role',compact('data'));
    }
    /**
     * 
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
        $data = User::create([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
        if($data){
            Alert::success('Sukses menambah data','Data berhasil disimpan');
            return back();
        } else{
            Alert::error('Error saat menambah data', 'Data tidak disimpan');
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
    public function edit($user)
    {
        $data = User::find($user);
        $role = Role::all();
        return view('admin.data.user.edit',compact('data','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $data = User::findOrFail($user);
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
    public function destroy($user)
    {
        $delete = User::destroy($user);
        if($delete){
        Alert::success('Berhasil menghapus data');
        return back();
        } else {
        Alert::error('Error saat menghapus data', 'Data tidak dihapus');
        return back();
        }
    }
}
