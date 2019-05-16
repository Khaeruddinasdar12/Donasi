<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ViewController extends Controller
{
    public function index()
    {
    	$totaldata = \App\Donasi::where('status', '=', 'sampai')->count();
    	$totaldonatur = \App\User::count();
        $totaldonasi = \App\Totaldonasi::findOrfail(1);
        $proker =\App\Proker::get();

    	return view('viewpublic.index', ['totaldonasi' => $totaldonasi, 'donasiuser' => $totaldata, 'totaldonatur'=> $totaldonatur, 'proker' => $proker ]);
    }

    public function about()
    {
    	return view('viewpublic.about');
    }
}
