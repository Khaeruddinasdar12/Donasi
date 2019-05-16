<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class Verifikasi extends Controller
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
        $user = \App\User::findOrfail(Auth::user()->id);
        $donasi = $user->donasi_awal;

        if ($request->get('jumlah') < $donasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Harus diatas Rp. '. format_uang($donasi));
        }
        $iduser = Auth::user()->id;
        // dd($iduser);
        $donasi         = new \App\Donasiuser;
        $donasi->jumlah = $request->jumlah;
        $donasi->iduser = $iduser ;
        $donasi->status = 'belum';
        $donasi->save();

        // $donasisaya = \App\Donasiuser::where('iduser', '=', $id);
        return view('userdonatur.verifikasi-donatur', ['jumlah' => $donasi]);
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
