<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Publickegiataninfak extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        if($cari) {
            $infak = DB::table('kegiataninfaks')
                    ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
                    ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
                    ->where('prokers.nama_kegiatan', "LIKE", '%'.$cari.'%')
                    ->paginate(10);
            return view('viewpublic.penyaluran-infak', ['infak' => $infak]);
        }
            $infak = DB::table('kegiataninfaks')
                    ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
                    ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
                    ->paginate(10);
            return view('viewpublic.penyaluran-infak', ['infak' => $infak]);
     }

    public function create()
    {
        //
    }

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
        // $detail = \App\Kegiataninfak::findOrfail($id);
        $detail = DB::table('kegiataninfaks')
                    ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
                    ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
                    ->where('kegiataninfaks.id', '=', $id)
                    ->first();
        return view('viewpublic.deskripsi-infak', ['detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
