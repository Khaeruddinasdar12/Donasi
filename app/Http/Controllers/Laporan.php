<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Laporan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $distinctinfaks = DB::table('kegiataninfaks')->selectRaw('YEAR(created_at) as year')
                            ->orderBy('created_at', '=', 'asc');

        $distinctukm    = DB::table('ukms')->selectRaw('YEAR(created_at) as date')
                            ->orderBy('created_at', '=', 'asc');

        $distinctyear   = DB::table('beasiswas')
                            ->selectRaw('YEAR(created_at) as date')
                            ->orderBy('created_at', '=', 'asc')   
                            ->union($distinctukm)
                            ->union($distinctinfaks)
                            ->get();
            // dd($distinctyear);
        if($request->get('year') && $request->get('month')) {
            $first = DB::table('beasiswas')
            ->select('nama_penerima', 'roles', 'jumlah_total', 'created_at')
            ->whereYear('created_at', '=', $request->get('year'))
            ->whereMonth('created_at', '=', $request->get('month'))
            ->orderBy('created_at','=','asc');

            $second = DB::table('kegiataninfaks')
            ->join('prokers', 'kegiataninfaks.nama_kegiatan', '=', 'prokers.id')
            ->select('prokers.nama_kegiatan', 'kegiataninfaks.roles', 'kegiataninfaks.jumlah', 'kegiataninfaks.created_at')
            ->whereYear('kegiataninfaks.created_at', '=', $request->get('year'))
            ->whereMonth('kegiataninfaks.created_at', '=', $request->get('month'))
            ->orderBy('created_at','=','asc');

            $laporan = DB::table('ukms')
            ->select('nama_penerima', 'roles', 'jumlah_total', 'created_at')
            ->whereYear('created_at', '=', $request->get('year'))
            ->whereMonth('created_at', '=', $request->get('month'))
            ->orderBy('created_at','=','asc')
            ->union($first)
            ->union($second)
            ->get();

            $totalbeasiswa  = \App\Beasiswa::whereYear('created_at', '=', $request->get('year'))
                            ->whereMonth('created_at', '=', $request->get('month'))
                            ->sum('jumlah_total');

            $totalinfak     = \App\kegiataninfak::whereYear('created_at', '=', $request->get('year'))
                            ->whereMonth('created_at', '=', $request->get('month'))
                            ->sum('jumlah');

            $totalukm       = \App\Ukm::whereYear('created_at', '=', $request->get('year'))
                            ->whereMonth('created_at', '=', $request->get('month'))
                            ->sum('jumlah_total');
            $totalkeseluruhan   = $totalukm + $totalbeasiswa + $totalinfak ;
            $year  = $request->get('year');
            $month = $request->get('month'); 
        }
            else {
                 $first = DB::table('beasiswas')
            ->select('nama_penerima', 'roles', 'jumlah_total', 'created_at');

            $second = DB::table('kegiataninfaks')
            ->join('prokers', 'kegiataninfaks.nama_kegiatan', '=', 'prokers.id')
            ->select('prokers.nama_kegiatan', 'kegiataninfaks.roles', 'kegiataninfaks.jumlah', 'kegiataninfaks.created_at');


            $laporan = DB::table('ukms')
            ->select('nama_penerima', 'roles', 'jumlah_total', 'created_at')
            ->union($first)
            ->union($second)
            ->get();

            $distinctinfaks = DB::table('kegiataninfaks')->selectRaw('YEAR(created_at) as year');
            $distinctukm    = DB::table('ukms')->selectRaw('YEAR(created_at) as date');

            $distinctyear = DB::table('beasiswas')
                            ->selectRaw('YEAR(created_at) as date')   
                            ->union($distinctukm)
                            ->union($distinctinfaks)
                            ->get();
            // dd($distinctyear);

            $totalbeasiswa  = \App\Beasiswa::sum('jumlah_total');
            $totalinfak     = \App\kegiataninfak::sum('jumlah');
            $totalukm       = \App\Ukm::sum('jumlah_total');
            $totalkeseluruhan   = $totalukm + $totalbeasiswa + $totalinfak ;
            $year   = "";
            $month  = "";
            }

            return view('laporan.laporan', ['laporan' => $laporan, 'total' => $totalkeseluruhan, 'tahun' => $distinctyear, 'year' => $year, 'month' => $month ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
