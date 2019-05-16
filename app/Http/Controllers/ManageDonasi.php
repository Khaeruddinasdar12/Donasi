<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
class ManageDonasi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(Request $request)
    {
        $status = $request->get('status');
        $users = \App\Donasi::get();
      
        if($status == 'belum') {
            $users = \App\Donasi::where('status', '=', $status)->orderBy('updated_at', 'desc')->get();
                // $users = \App\Donasi::whereMonth('created_at', '2')->get();
  
        } else if($status == 'sampai') {
                $users = \App\Donasi::with('admins')//->where('donasis.status', $status)
                ->join('admins', 'admins.id', '=', 'donasis.confirm_by')
                ->select('donasis.*', 'admins.name as namaadmin')
                ->orderBy('updated_at', 'desc')
                ->get();
            } 
            return view('managedonasi.donasiuser', ['donasi' => $users ]);
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

            $donasisampai = \App\Donasi::findOrFail($id);
            $email = $donasisampai->email;

            $data = array(
                'name' => $donasisampai->nama,
                'jumlah' => $donasisampai->jumlah,
                'email_body' => 'Donasi Anda telah diterima oleh Posko Yatim Makassar'
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
            $donasisampai->confirm_by = \Auth::user()->id;
            $tambah = $donasisampai->jumlah;
            $donasisampai->save();

            $totaldonasi = \App\Totaldonasi::find(1);
            $totall = $totaldonasi->total;
            $totaldonasi->total = $totall + $tambah ;

            $totaldonasi->save();
            return redirect()->back()->with('status', 'Donasi Telah Diterima');

        }


        public function destroy($id)
        {
        //
        }
    }
