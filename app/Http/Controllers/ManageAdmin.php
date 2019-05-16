<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class ManageAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = \App\Admin::all();
        return view('manageadmin.index', ['admin'=> $admin]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageadmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'fotoadmin' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);



            $user = new \App\Admin;
            $user->name     = $request->nama;
            $user->email    = $request->email;
                $foto = $request->file('fotoadmin');
                if($foto){
                    $foto_path = $foto->store('fotoadmin', 'public');
                    $user->foto = $foto_path;
                }
            $user->jkel     = $request->jkel;
            $user->phone    = $request->phone;
            $user->password = Hash::make($request->get('password'));
            $user->save();

            return Redirect()->back()->with('status', 'Admin Succescfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = \App\Admin::findOrfail($id);
        return view('manageadmin.show', ['admin'=>$admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = \App\Admin::findOrfail($id);
        return view('manageadmin.edit', ['admin'=>$admin]);
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
        $this->validate($request, [
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $admin = \App\Admin::findOrfail($id);
        $admin->name    = $request->name;
        $admin->email    = $request->email;
        $admin->phone    = $request->nohp;
        $admin->jkel     = $request->jkel;
         $foto = $request->file('foto');
         $pass = $request->password;
        if($pass){
            $admin->password = Hash::make($request->get('password'));
        }
        if($foto){
            if($admin->foto && file_exists(storage_path('app/public/' . $admin->foto))) { 
                \Storage::delete('public/'. $admin->foto);
            }
            $foto_path = $foto->store('fotoadmin', 'public');
            $admin->foto = $foto_path;
        }
        $admin->save();
        return redirect()->back()->with('status', 'Admin succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user()->id == $id)
        {
            return redirect()->back()->With('gagal', 'Gagal menghapus data, akun sedang digunakan ');
        }
        $delete = \App\Admin::findOrfail($id);
        if(file_exists(storage_path('app/public/' . $delete->foto) )) {
                \Storage::delete('public/'. $delete->foto);
            }
        $delete->delete();
        return redirect()->back()->With('status', 'Berhasil menghapus data');
    }
}
