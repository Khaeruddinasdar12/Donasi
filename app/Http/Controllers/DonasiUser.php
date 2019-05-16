<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewpublic.pembayaran'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewpublic.donasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pembayaran()
    {
        return view('viewpublic.pembayaran');   
    }

    public function prosespembayaran(Request $request)
    {
        $iduser = $request->id;
       $validasi = $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $upload = \App\Donasi::find($iduser);
        if($upload == null)
        {
            return redirect()->back()->with('gagal', 'Kode tidak ditemukan');
        }

        $foto = $request->file('photo');
        if($foto){
                    $foto_path      = $foto->store('buktiuser', 'public');
                    $upload->foto   = $foto_path;
        }
        $upload->save();

        return redirect()->back()->with('status', 'Bukti pengiriman Anda akan dikonfirmasi oleh admin dan Anda akan menerima email dari pihak posko yatim ');   
    }

    public function store(Request $request)
    {
        if($request->jumlah < 10000 ) {
            return redirect()->back()->withInput()->with('gagal', 'Minimal Rp. 10.000');
        }
        $donasi = new \App\Donasi;
        $donasi->nama   = $request->nama;
        $donasi->jkel   = $request->jkel;
        $donasi->email  = $request->email;
        $donasi->nohp   = $request->nohp;
        $donasi->pekerjaan = $request->pekerjaan;
        $donasi->jumlah = $request->jumlah;
        $donasi->status = 'belum';
        $donasi->save();
         return view('viewpublic.verifikasi', ['donasi' => $donasi]);
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
        $validasi = $this->validate($request, [
            'foto' => 'image|mimes:jpeg,png,jpg|size:3072'
        ]);

        $iduser = $request->id;
        $upload = \App\Donasi::where('id', '=', $iduser);

        if($request->file('foto')){
                    $foto = $request->file('foto');
                    if($upload->foto && file_exists(storage_path('app/public/' . $upload->foto))) { 
                        \Storage::delete('public/'. $upload->foto);
                }
                    $foto_path = $foto->store('buktiuser', 'public');
                    $upload->foto = $foto_path;
        }
        
        $upload->save();


        return redirect()->back()->with('status', 'Bukti Pengiriman Anda Akan Dikonfirmasi Oleh Admin');
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
