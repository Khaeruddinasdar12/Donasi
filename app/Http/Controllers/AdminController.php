<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaldonasi = \App\Totaldonasi::findOrFail(1);
        $total = format_uang($totaldonasi->total);

        $totaldonatur = \App\User::where('status', '=', 'active')->count();
        $donasi = \App\Donasi::where('status', '=', 'sampai')->count();

        return view('dashboard', ['totaldonasi'=>$total, 'totaldonatur'=>$totaldonatur, 'user' => $donasi]);
    }
}
