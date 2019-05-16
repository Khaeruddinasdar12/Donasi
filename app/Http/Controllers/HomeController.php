<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Validator;
use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function guard()
    {
        return Auth::guard();
    }
    protected function loggedOut(Request $request)
    {
        //
    }

    public function stop(Request $request)
    {
        $id = Auth::user()->id;
        $stop = \App\User::findOrfail($id);
        $stop->status = 'inactive';
        $stop->save();
        $this->guard('auth')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('userdonatur.about');
    }

    public function awal()
    {
        $totaldata = \App\Donasi::where('status', '=', 'sampai')->count();
        $totaldonatur = \App\User::count();
        $totaldonasi = \App\Totaldonasi::findOrfail(1);
        $proker =\App\Proker::get();
        // dd($totaldonasi);
        return view('userdonatur.donatur-index',['donasiuser' => $totaldata, 'totaldonasi' => $totaldonasi, 'totaldonatur' => $totaldonatur, 'proker' => $proker]);
    }
    public function index()
    {
        $donasisaya = \App\Donasiuser::where('iduser', '=', Auth::user()->id)
        ->orderBy('updated_at','=', 'desc')
        ->get();
        // dd($donasisaya);
        return view('userdonatur.dashboard-donatur',['donasisaya' => $donasisaya ]);
    }

    public function donasidonatur()
    {
        $user = \App\User::findOrfail(Auth::user()->id);
        $donasi = $user->donasi_awal;
        // dd($view);
        return view('userdonatur.donasi-donatur', ['donasi' => $donasi]);
    }

    public function editprofile()
    {
        return view('userdonatur.edit-profil');
    }

    

    public function daftardonatur()
    {
        $donatur = \App\User::get();
        return view('userdonatur.daftar-donatur',['donatur' =>$donatur]);
    }

    public function daftarmitra()
    {
        $mitra = \App\Mitra::get();
        return view('userdonatur.daftar-mitra', ['mitra' => $mitra]);
    }

    public function pembayarandonatur($id)
    {   
        // $donasisaya = \App\Donasiuser::where('iduser', '=', $id);
        return view('userdonatur.pembayaran-donatur',['id' => $id]);
    }

    public function konfirmasi(Request $request, $id)
    {   
        // return redirect()->back();
        $this->validate($request, [
            'bukti' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        // $request->validate([
        //     'fileToUpload' => 'required|file|max:1024',
        // ]);
        // $validator = Validator::make($request->all(), [
        //     'bukti' => 'max:3072' ,
        // ]);

        if($request->file('bukti') == null )
        // if($request->bukti == null) {
            return redirect()->back()->with('status', 'Image Tidak Ditemukan');
        
        $donasisaya = \App\Donasiuser::findOrfail($id);
        $foto = $request->file('bukti');
                if($foto){
                    if($donasisaya->foto && file_exists(storage_path('app/public/' . $donasisaya->foto))) { 
                \Storage::delete('public/'. $donasisaya->foto);
                }
                    $foto_path = $foto->store('buktidonatur', 'public');
                    $donasisaya->foto = $foto_path;
                }

        $donasisaya->status = 'proses';
        $donasisaya->save();
        return redirect()->route('donatur.dashboard')->with('status', 'Bukti Pembayaran Telah Diupload');
    }

    public function verifikasi(Request $request)
    {   
        $user = \App\User::findOrfail(Auth::user()->id);
        $donasi = $user->donasi_awal;

        if ($request->get('jumlah') < $donasi) {
            return redirect()->back()->withInput()->with('gagal', 'Gagal Menginput Data, Harus diatas Rp. '. format_uang($donasi));
        }
        $iduser = Auth::user()->id;
        // dd($iduser);
        $donasi         = new \App\Donasiuser;
        $donasi->jumlah = $request->jumlah;
        $donasi->iduser = $iduser ;
        $donasi->status = 'belum';
        $donasi->save();

        // $donasisaya = \App\Donasiuser::where('iduser', '=', $id);
        return view('userdonatur.verifikasi-donatur', ['jumlah' => $donasi]);
    }

    public function proseseditprofile(Request $request)
    {
        $this->validate($request, [
            'profile' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $iduser = Auth::user()->id;
        $profile = \App\User::findOrfail($iduser);   
            if($request->donasi < 50000)
                return redirect()->back()->with('gagal', 'Donasi minimal harus diatas Rp. 50.000');
            
            if($request->file('profile')){
                    $foto = $request->file('profile');
                    if($profile->foto && file_exists(storage_path('app/public/' . $profile->foto))) { 
                        \Storage::delete('public/'. $profile->foto);
                }
                    $foto_path = $foto->store('fotouser', 'public');
                    $profile->foto = $foto_path;
                }

        $profile->name      = $request->name;
        $profile->jkel      = $request->jkel;
        $profile->email     = $request->email;
                if($request->pass){
                    $profile->password = Hash::make($request->get('pass'));
                }
        $profile->nohp      = $request->nohp;
        $profile->pekerjaan = $request->pekerjaan;
        $profile->alamat    = $request->alamat;
        $profile->save();
        return redirect()->back()->with('status', 'Data Profile Berhasil Diedit');
    }
}
