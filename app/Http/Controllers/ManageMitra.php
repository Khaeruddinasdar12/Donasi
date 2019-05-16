<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class ManageMitra extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $mitra = DB::table('mitras')
                ->join('admins', 'admins.id', '=', 'mitras.created_by')
                ->select('mitras.*', 'admins.name as namaadmin')
                ->get();
        Alert::success('Title', 'Message');
        alert()->success('You have been logged out.', 'Good bye!');
            return view('managemitra.index',['mitra' => $mitra]);
    }

    public function create()
    {
        return view('managemitra.create');
    }

    public function store(Request $request)
    {
        if (is_numeric($request->jumlah) != TRUE ) {
            return redirect()->back()->withInput()->with('gagal', 'Jumlah Anggota Harus Angka');
        }
        else if($request->jumlah < 1) {
            return redirect()->back()->withInput()->with('gagal', 'Jumlah Anggota Harus Lebih Dari 0');
        }
        $mitra = new \App\Mitra;
        $mitra->nama    = $request->nama;
        $mitra->alamat  = $request->alamat;
        $mitra->email   = $request->email;
        $mitra->jumlah  = $request->jumlah;
        $mitra->created_by = \Auth::user()->id;
        $mitra->save();
        return redirect()->back()->with('status', 'Berhasil Menambahkan Mitra');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mitra = \App\Mitra::findOrfail($id);   
        return view('managemitra.edit',['mitra' => $mitra ]);    
    }

    public function update(Request $request, $id)
    {
        if (is_numeric($request->jumlah) != TRUE ) {
            return redirect()->back()->with('gagal', 'Jumlah Anggota Harus Angka');
        }
        else if($request->jumlah < 1) {
            return redirect()->back()->with('gagal', 'Jumlah Anggota Harus Lebih Dari 0');
        }
        $mitra = \App\Mitra::findOrfail($id);
        $mitra->nama    = $request->nama;
        $mitra->email    = $request->email;
        $mitra->alamat    = $request->alamat;
        $mitra->jumlah    = $request->jumlah;
        $mitra->updated_by    = \Auth::user()->name;
        $mitra->save();

        return redirect()->back()->with('status', 'Data Mitra Telah Diedit');
    }

    public function destroy($id)
    {
        $cekbeasiswa = \App\Beasiswa::where('id_mitra', '=' , $id)->count();;
        if ($cekbeasiswa >= 1)
        return redirect()->back()->with('gagal', 'Data Tidak Dapat Dihapus, ada penerima beasiswa dari mitra ini');
        
        $mitra = \App\Mitra::findOrfail($id);
        $mitra->delete();
        return redirect()->back()->with('status', 'Data Mitra Telah Dihapus');

    }
}
