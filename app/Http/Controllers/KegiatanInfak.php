<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KegiatanInfak extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $cari = $request->cari;
    //     if($cari){
    //           $infak = DB::table('kegiataninfaks')
    //                 ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
    //                 ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
    //                 ->where('prokers.nama_kegiatan', "LIKE", '%'.$cari.'%')
    //                 ->paginate(10);
    //     return view('userdonatur.penyaluran-infak', ['infak' => $infak]);
    //     }
    //     // $infak = \App\Kegiataninfak::paginate(10);
    //     $infak = DB::table('kegiataninfaks')
    //                 ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
    //                 ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
    //                 ->paginate(10);
    //     return view('userdonatur.penyaluran-infak', ['infak' => $infak]);
    // }
     public function index(Request $request)
    {
        $cari = $request->get('cari');
        if($cari) {
            $infak = DB::table('kegiataninfaks')
                    ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
                    ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
                    ->where('prokers.nama_kegiatan', "LIKE", '%'.$cari.'%')
                    ->paginate(10);
            return view('userdonatur.penyaluran-infak', ['infak' => $infak]);
        }
            $infak = DB::table('kegiataninfaks')
                    ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
                    ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
                    ->paginate(10);
            return view('userdonatur.penyaluran-infak', ['infak' => $infak]);
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
        // $detail = \App\Kegiataninfak::findOrfail($id);
        $detail = DB::table('kegiataninfaks')
                    ->join('prokers', 'prokers.id', '=', 'kegiataninfaks.nama_kegiatan')
                    ->select('kegiataninfaks.*', 'prokers.nama_kegiatan as nama')
                    ->where('kegiataninfaks.id', '=', $id)
                    ->first();

        return view('userdonatur.deskripsi-infak', ['detail' => $detail]);
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
