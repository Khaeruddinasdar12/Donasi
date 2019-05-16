<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;

class ManageDonasiDonatur extends Controller
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
        $status = $request->get('status');

        if($status== 'belum') {
            $status = 'proses';
          //  $users = \App\Donasiuser::where('status', '=', $status)->get();
            $users = DB::table('donasiusers')
                ->join('users', 'users.id', '=', 'donasiusers.iduser')
                ->select('users.name', 'users.email', 'users.id as iduser', 'donasiusers.*', 'users.jkel')
                ->where('donasiusers.status', '=', $status)
                ->orderBy('donasiusers.updated_at', 'desc')
                ->get();
        } else if($status== 'sampai') {
            $users = DB::table('donasiusers')
                ->join('users', 'users.id', '=', 'donasiusers.iduser')
                ->join('admins', 'admins.id', '=', 'donasiusers.confirm_by')
                ->select('users.name', 'users.email', 'users.id as iduser', 'donasiusers.*', 'admins.name as namaadmin', 'users.jkel')
                ->where('donasiusers.status', '=', $status)
                ->orderBy('donasiusers.updated_at', 'desc')
                ->get();
        } else {
            // $users = DB::table('donasiusers')->get();
            $users = DB::table('donasiusers')
                ->join('users', 'users.id', '=', 'donasiusers.iduser')
                // ->join('admins', 'admins.id', '=', 'donasiusers.confirm_by')
                                        // ->select('users.*', 'donasiusers.*')
                ->select('users.*', 'donasiusers.*')
                ->orderBy('donasiusers.updated_at', 'desc')
                ->get();

            // $users = DB::table('donasiusers')->where('iduser', '=', 4)->sum('jumlah');
            // dd($users);
        }

        return view('managedonasi.donasidonatur', ['donasi' => $users ]);
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
        //
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
        // dd($request->iduser);
        $donasisampai   = \App\Donasiuser::findOrFail($id);
        $iddonatur      = $donasisampai->iduser;


        $datadonatur    = \App\User::findOrFail($iddonatur);
        $emaildonatur   = $datadonatur->email;
        $email = $emaildonatur;

        $data = array(
                'name' => $datadonatur->name,
                'email_body' => 'Donasi Anda telah diterima oleh Posko Yatim Makassar',
                'jumlah' => $donasisampai->jumlah
            );

        Mail::send('sendemail', $data, function($mail) use($email) {
            $mail->to($email, 'no-reply')
                 ->subject("Penerimaan Donasi");
            $mail->from('mulayfor@gmail.com', 'Posko Yatim');        
        });
        
        if (Mail::failures()) {
            return redirect()->back()->with('gagal', 'Donasi Telah Diterima');
        }

        $donasisampai->status='sampai';
            $tambah = $donasisampai->jumlah;
            $iduser = $donasisampai->iduser;
        $donasisampai->confirm_by = \Auth::user()->id;
        $donasisampai->save();

        // $iduser = ;
        $totaldonatur = \App\User::findOrFail($iduser);
        $totaldonatur->totaldonasi = $totaldonatur->totaldonasi + $tambah;
        $totaldonatur->save();

        $totaldonasi = \App\Totaldonasi::find(1);
        $totall = $totaldonasi->total;
        $totaldonasi->total = $totall + $tambah ;
        $totaldonasi->save();
         return redirect()->back()->with('status', 'Donasi Telah Diterima');
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
