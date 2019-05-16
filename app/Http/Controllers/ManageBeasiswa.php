<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ManageBeasiswa extends Controller
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
        $totaldonasi = \App\Totaldonasi::findOrFail(1);
        $h = $totaldonasi->total;
        $total = format_uang($h);
        $beasiswa = DB::table('beasiswas')
                ->join('mitras', 'mitras.id', '=', 'beasiswas.id_mitra')
                ->select('beasiswas.*', 'mitras.nama as namamitra')
                ->get();
        return view('managebeasiswa.index',['beasiswa' => $beasiswa, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mitra = \App\Mitra::get();
        $totaldonasi = \App\Totaldonasi::findOrFail(1);
        $h = $totaldonasi->total;
        $total = format_uang($h);
        return view('managebeasiswa.create',['total' => $total, 'mitra' => $mitra]);
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
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);

        $total = \App\Totaldonasi::findOrFail(1);
        $totaldonasi = $total->total;
        if ($request->get('jumlah_persemester') > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } else if ($request->get('jumlah_persemester') < 10000) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Harus diatas 0 Rupiah');
        } 
        

        $beasiswa = new \App\Beasiswa;
        $beasiswa->nama_penerima     = $request->nama_penerima;
        $beasiswa->jkel              = $request->jkel;
        $beasiswa->kampus            = $request->kampus;
        $beasiswa->jumlah_persemester= $request->jumlah_persemester;
        $beasiswa->jumlah_total      = $request->jumlah_persemester;
        $beasiswa->deskripsi         = $request->deskripsi;
        $beasiswa->status            = 'active';
        $beasiswa->roles             = 'beasiswa';
        $beasiswa->pendidikan        = $request->pendidikan;
            if($request->pendidikan == 'S1') {
                $beasiswa->lama = 7;
            } else {
                $beasiswa->lama = 5;
            }
        $beasiswa->created_by        = \Auth::user()->id;
        $dokumentasi = $request->file('dokumentasi');
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('fotobeasiswa', 'public');
            $beasiswa->dokumentasi = $dokumentasi_path;
        }
        $beasiswa->id_mitra       = $request->mitra;
        $beasiswa->save();
        $total->total = $totaldonasi - $request->get('jumlah_persemester');
        $total->total_tersalurkan = $total->total_tersalurkan + $request->get('jumlah_persemester');
        $total->save();

        return redirect()->back()->with('status', 'Data Beasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beasiswa = DB::table('beasiswas')
                ->join('mitras', 'mitras.id', '=', 'beasiswas.id_mitra')
                ->join('admins', 'admins.id', '=', 'beasiswas.created_by')
                ->select('beasiswas.*', 'mitras.nama as namamitra', 'admins.name as namaadmin')
                ->where('beasiswas.id', '=', $id)
                ->first();

        return view('managebeasiswa.show', ['show' => $beasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mitra = \App\Mitra::get();
        $beasiswa = \App\Beasiswa::findOrfail($id);   
        return view('managebeasiswa.edit',['beasiswa' => $beasiswa, 'mitra' => $mitra ]);
    }

    public function cair($id) 
    {
        $beasiswa = \App\Beasiswa::findOrfail($id);
        $total = \App\Totaldonasi::findOrFail(1);
        $totaldonasi = $total->total;
        if ($beasiswa->jumlah_persemester > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } 
        $total->total = $totaldonasi - $beasiswa->jumlah_persemester;
        $total->total_tersalurkan = $total->total_tersalurkan + $beasiswa->jumlah_persemester;
        $total->save();

        // $beasiswa = \App\Beasiswa::findOrfail($id);
        $beasiswapersemster     = $beasiswa->jumlah_persemester;
        $beasiswa->jumlah_total = $beasiswa->jumlah_total + $beasiswapersemster ;
        $beasiswa->lama         = $beasiswa->lama - 1;
        if($beasiswa->lama == 0) {
            $beasiswa->status = 'inactive';
        }
        $beasiswa->save(); 
        return redirect()->back()->with('status', 'Beasiswa Berhasil di cairkan');
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
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);
        $beasiswa = \App\Beasiswa::findOrfail($id);
        $beasiswa->nama_penerima    = $request->nama_penerima;
        $beasiswa->kampus           = $request->kampus;
        $beasiswa->jkel             = $request->jkel;
        $beasiswa->deskripsi        = $request->deskripsi;
        $beasiswa->updated_by       = \Auth::user()->name;
        $beasiswa->id_mitra         = $request->mitra;
         $foto = $request->file('dokumentasi');
        if($foto){
            if($beasiswa->dokumentasi && file_exists(storage_path('app/public/' . $beasiswa->dokumentasi))) { 
                \Storage::delete('public/'. $beasiswa->dokumentasi);
            }
            $foto_path = $foto->store('fotobeasiswa', 'public');
            $beasiswa->dokumentasi = $foto_path;
        }
        $beasiswa->save();

        return redirect()->back()->with('status', 'Data Beasiswa Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beasiswa = \App\Beasiswa::findOrfail($id);
        $beasiswa->delete();
        return redirect()->back()->with('status', 'Data Beasiswa Berhasil Dihapus');
    }
}
