<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
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
         $validasi = $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        if($request->donasi < 50000)
            return redirect()->back()->with('gagal', 'Minimal donasi perbulan Rp.50.000');

        $adduser = new \App\User;
        $adduser->name          = $request->name;
        $adduser->jkel          = $request->jkel;
        $adduser->email         = $request->email;
        $adduser->password      = Hash::make($request->get('password'));
        $adduser->nohp          = $request->phone;
        $adduser->alamat        = $request->address;
        $adduser->status        = 'active';
        $adduser->donasi_awal   = $request->donasi;
        $adduser->pekerjaan     = $request->job;
            $foto = $request->file;
        if($foto) {
            $path = $foto->store('fotouser', 'public');
            $adduser->foto = $path;
        }
        $adduser->save();

        return redirect()->back()->with('status', 'Account succesfully added');
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
}
