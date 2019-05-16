<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class ManageProker extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $proker = DB::table('prokers')
                ->join('admins', 'admins.id', '=', 'prokers.created_by')
                ->select('prokers.*', 'admins.name as namaadmin')
                ->get();
        alert()->success('Data telah Ditambahkan', 'Berhasil')->persistent('Close');
        Alert::success('this is success alert','haha');
        return view('manageproker.index', ['proker' => $proker]);
    }

    public function create()
    {
        return view('manageproker.create');
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);

        $proker = new \App\Proker ;
        $dokumentasi = $request->file('dokumentasi');
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('fotoproker', 'public');
            $proker->dokumentasi = $dokumentasi_path;
        }
        $proker->nama_kegiatan  = $request->nama_kegiatan;
        $proker->deskripsi      = $request->deskripsi;
        $proker->created_by     = \Auth::user()->id;
        $proker->save();
        return redirect()->back()->with('status', 'Data Program Kerja Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $proker = DB::table('prokers')
                ->join('admins', 'admins.id', '=', 'prokers.created_by')
                ->select('prokers.*', 'admins.name as namaadmin')
                ->where('prokers.id', '=', $id)
                ->first();
        return view('manageproker.show', ['proker' => $proker]);
    }

    public function edit($id)
    {
        $proker = \App\Proker::findOrfail($id);
        return view('manageproker.edit', ['proker'=>$proker]);   
    }

    public function update(Request $request, $id)
    {
        $proker = \App\Proker::findOrfail($id);
        $foto = $request->file('dokumentasi');
        if($foto){
            if($proker->dokumentasi && file_exists(storage_path('app/public/' . $proker->dokumentasi))) { 
                \Storage::delete('public/'. $proker->dokumentasi);
            }
            $foto_path = $foto->store('fotobeasiswa', 'public');
            $proker->dokumentasi = $foto_path;
        }
        $proker->nama_kegiatan  = $request->nama_kegiatan;
        $proker->deskripsi      = $request->deskripsi;
        $proker->save();
        return redirect()->back()->with('status', 'Data Program Kerja Berhasil Diubah');
    }

    public function destroy($id)
    { 
        $cekinfak = \App\Kegiataninfak::where('nama_kegiatan', '=' , $id)->count();
    
        if ($cekinfak >= 1)
        return redirect()->back()->with('gagal', 'Data Tidak Dapat Dihapus, ada data kegiatan infak tentang program kerja ini');
        
        $proker = \App\Proker::findOrfail($id);
        \Storage::delete('public/'. $proker->dokumentasi);
        $proker->delete();
        return redirect()->back()->with('status', 'Data Program Kerja Telah Dihapus');
    }
}
