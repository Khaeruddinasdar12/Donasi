<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PublicBeasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        // dd($cari);
        if($cari) {
            $beasiswa = \App\Beasiswa::where('nama_penerima', "LIKE", '%'.$cari.'%')->paginate(10);
            return view('viewpublic.beasiswa', ['beasiswa' => $beasiswa]);
        }

        $beasiswa = \App\Beasiswa::paginate(4);
        return view('viewpublic.beasiswa', ['beasiswa' => $beasiswa]);
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
        
        $detail = DB::table('beasiswas')
                ->join('mitras', 'mitras.id', '=', 'beasiswas.id_mitra')
                ->select('beasiswas.*', 'mitras.nama as namamitra')
                ->where('beasiswas.id', '=', $id)
                ->first();
        return view('viewpublic.deskripsi-beasiswa', ['detail' => $detail]);
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
