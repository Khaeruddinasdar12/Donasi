<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ManageUsers extends Controller
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
        if($status){
            if($status == 'donatur-tidak-aktif') {
                $status = 'inactive';
            $user = DB::table('users')
                    ->leftjoin('admins', 'admins.id', '=', 'users.deleted_by')
                    ->select('users.*', 'admins.name as namaadmin')
                    ->where('users.status', '=', 'inactive')
                    ->get();
            }
        
        }
        else $user = \App\User::where('status', '=', 'active')->get();
        return view('manageuser.index', ['user' => $user]);
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
        $user = \App\User::findOrfail($id);
        return view('manageuser.show',['user'=>$user]);
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
        $user = \App\User::findOrfail($id);
        $user->deleted_by = \Auth::user()->id;
        $user->status = 'inactive';
        $user->save();
        return redirect()->back()->with('status', 'Donatur berhasil dihentikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
