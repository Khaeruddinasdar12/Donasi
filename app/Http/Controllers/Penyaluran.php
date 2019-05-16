<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\URL;
use DB;
class Penyaluran extends Controller
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
   
    public function index(Request $request) 
    {
        $status = $request->get('penyaluran');
        if($status == 'ukm') {
            $penyaluran = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->where('penyaluran', '=', $status)
                ->get();
        }
        else if ($status == 'beasiswa') {
            $penyaluran = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->where('penyaluran', '=', $status)
                ->get();
        } 
        else if ($status == 'umum') {
            $penyaluran = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->where('penyaluran', '=', $status)
                ->get();
        }
        else {
            $penyaluran = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->get();
        }
        
        return view('Pemberdayaanadmin.index', ['book' => $penyaluran]);
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

        return view('Pemberdayaanadmin.create', ['total'=> $total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = \App\Totaldonasi::findOrFail(1);
        $totaldonasi = $total->total;
        if ($request->get('jumlah') > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } else if ($request->get('jumlah') < 10000) {
            return redirect()->back()->with('gagal', 'Gagal Menginput Data, Harus diatas 0 Rupiah');
        } else 
        $total->total = $totaldonasi - $request->get('jumlah');
        $total->save();


        $new_book = new \App\Penyaluran;
        $new_book->name = $request->get('nama');
        $new_book->deskripsi = $request->get('deskripsi');
        $new_book->jumlah = $request->get('jumlah');
        $new_book->penyaluran = $request->get('penyaluran');
        $dokumentasi = $request->file('dokumentasi');
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('dokumentasi', 'public');
            $new_book->dokumentasi = $dokumentasi_path;
        }
        $new_book->created_by = \Auth::user()->id;
        $new_book->save();
            return redirect()->route('penyaluran.create')->with('status', 'Penyaluran Successfully Saved and Published');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->where('penyalurans.id', '=', $id)
                ->first();
        return view('pemberdayaanadmin.show', ['show' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = DB::table('penyalurans')
                ->join('admins', 'admins.id', '=', 'penyalurans.created_by')
                ->select('penyalurans.*', 'admins.name as namaadmin')
                ->where('penyalurans.id', '=', $id)
                ->first();
        return view('Pemberdayaanadmin.edit', ['pemberdayaanadmin' => $book]);
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
         $total = \App\Totaldonasi::findOrfail(1);
        $totaldonasi = $total->total;
        // dd($totaldonasi);
        if ($request->get('jumlah') > $totaldonasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Saldo Tidak Cukup');
        } else if ($request->get('jumlah') < 10000) {
            return redirect()->back()->with('gagal', 'Gagal Menginput Data, Harus diatas 0 Rupiah');
        } 

        $book = \App\Penyaluran::findOrfail($id);
        $book->name = $request->get('nama');
        $book->deskripsi = $request->get('deskripsi');
        $book->penyaluran = $request->get('penyaluran');
        $book->jumlah = $request->get('jumlah');
        $book->updated_by = \Auth::user()->name;
        $new_cover = $request->file('dokumentasi');
        if($new_cover){
            if($book->dokumentasi && file_exists(storage_path('app/public/' . $book->dokumentasi))) { 
                \Storage::delete('public/'. $book->dokumentasi);
            }
            $new_cover_path = $new_cover->store('dokumentasi', 'public');
            $book->dokumentasi = $new_cover_path;
        }
        $book->save();
        return redirect()->route('penyaluran.edit', ['id'=>$book->id])->with('status', 'Book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $book = \App\penyaluran::findOrFail($id);
        $book->delete();    
        return redirect()->route('penyaluran.index')->with('status', 'Penyaluran moved to trash');
    }

    public function trash()
    {
        $books = \App\Penyaluran::onlyTrashed()->paginate(10);
        return view('Pemberdayaanadmin.trash', ['books' => $books]);
    }

    public function deletepermanent($id){
        $book = \App\Penyaluran::findOrFail($id);
        $book->delete(); 
            return redirect()->route('penyaluran.index')->with('status', 'Penyaluran
                permanently deleted!');
        
    }

    public function restore($id){
        $category = \App\Penyaluran::withTrashed()->findOrFail($id);
        if($category->trashed()){
            $category->restore();
            if ($category->status == 'draft') {
                return redirect()->route('penyaluran.index.?status=draft')->with('status', 'Penyaluran successfully restored');
            } else
            return redirect()->route('penyaluran.index')->with('status', 'Penyaluran successfully restored');
            
        } else {
            return redirect()->route('penyaluran.index')->with('status', 'Category is not in trash');
        }
        return redirect()->route('penyaluran.index')->with('status', 'Penyaluran successfully restored');
    }

    public function wow()
    {
        $total = \App\Donasi::sum('jumlah');

        $totaldonasi = \App\Totaldonasi::find(1);
        $totaldonasi->total = 3;
        $totaldonasi->save();
        return view('wow', ['donasi' => $total]);
    }
}
