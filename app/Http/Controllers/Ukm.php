<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Ukm extends Controller
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
        $ukm = \App\Ukm::get();
        // dd($ukm);
        return view('ukm.index',['ukm'=>$ukm, 'total' => $total ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $totaldonasi = \App\Totaldonasi::findOrFail(1);
        $h = $totaldonasi->total;
        $total = format_uang($h);
        return view('ukm.create',['total' => $total]);
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
        
        if ($request->lama < 1) 
        return redirect()->back()->with('gagal', 'Lama donasi harus lebih dari 1 tahun');
        
        $total = \App\Totaldonasi::findOrFail(1);
        $totaldonasi = $total->total;
        if ($request->get('jumlah_awal') > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } else if ($request->get('jumlah_awal') < 10000) {
            return redirect()->back()->with('gagal', 'Gagal Menginput Data, Harus diatas Rp. 10.000');
        } else 
        $total->total = $totaldonasi - $request->get('jumlah_awal');
        $total->total_tersalurkan = $total->total_tersalurkan + $request->get('jumlah_awal');
        $total->save();

        $ukm = new \App\Ukm;
        $ukm->nama_penerima     = $request->nama_penerima;
        $ukm->nama_usaha        = $request->nama_usaha;
        $ukm->jumlah_awal       = $request->jumlah_awal;
        $ukm->jumlah_total      = $request->jumlah_awal;
        $ukm->lama              = $request->lama;
        $ukm->deskripsi         = $request->deskripsi;
        $ukm->status            = 'active';
        $ukm->roles             = 'usaha kecil menengah';
        $ukm->created_by        = \Auth::user()->id;
        $dokumentasi = $request->file('dokumentasi');
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('fotoukm', 'public');
            $ukm->dokumentasi = $dokumentasi_path;
        }
        $ukm->save();

        return redirect()->back()->with('status', 'Data Ukm Berhasil Ditambahkan');
    }

    public function cair(Request $request, $id) 
    {
        
        $total = \App\Totaldonasi::findOrFail(1);
        $totaldonasi = $total->total;
        if ($request->tambah_donasi > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } else if ($request->tambah_donasi < 10000) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Harus diatas Rp. 10.000');
        } else if ($request->lama < 1) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Tambahan donasi harus 1 tahun keatas');
        }
        $total->total = $totaldonasi - $request->tambah_donasi;
        $total->save();

        $ukm = \App\Ukm::findOrfail($id);
        $ukm->jumlah_total = $ukm->jumlah_total + $request->tambah_donasi ;
        $ukm->lama         = $ukm->lama + $request->lama;
        
        $ukm->save(); 
        return redirect()->back()->with('status', 'Dana Ukm Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::table('ukms')
                ->join('admins', 'admins.id', '=', 'ukms.created_by')
                ->select('ukms.*', 'admins.name as namaadmin')
                ->where('ukms.id', '=', $id)
                ->first();
        return view('ukm.show', ['show' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ukm = \App\Ukm::findOrfail($id);   
        return view('ukm.edit',['ukm' => $ukm ]);   
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
        
        if ($request->lama < 1) 
        return redirect()->back()->with('gagal', 'Lama donasi harus lebih dari 1 tahun');
        $ukm = \App\Ukm::findOrfail($id);
        $ukm->nama_penerima    = $request->nama_penerima;
        $ukm->nama_usaha       = $request->nama_usaha;
        $ukm->updated_by       = \Auth::user()->name;
        $ukm->deskripsi        = $request->deskripsi;
        $ukm->lama             = $request->lama;
         $foto = $request->file('dokumentasi');
        if($foto){
            if($ukm->dokumentasi && file_exists(storage_path('app/public/' . $ukm->dokumentasi))) { 
                \Storage::delete('public/'. $ukm->dokumentasi);
            }
            $foto_path = $foto->store('fotoukm', 'public');
            $ukm->dokumentasi = $foto_path;
        }
        $ukm->save();

        return redirect()->back()->with('status', 'Data UKM Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ukm = \App\Ukm::findOrfail($id); 
        $ukm->delete();  
        return redirect()->back()->with('status','Data Ukm Berhasil Dihapus'); 
    }
}
