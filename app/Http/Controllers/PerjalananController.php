<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_perjalanan;
use App\User;
use Auth;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perjalanan = tb_perjalanan::where('user_id', auth()->user()->id)->get();
        return view ('perjalanan.index', compact('perjalanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('perjalanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'jam' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required'
        ]); 

        $perjalanan = [
            'user_id'       => Auth::User()->id,
            'tanggal'       => $request->tanggal,
            'jam'           => $request->jam,
            'lokasi'        => $request->lokasi,
            'suhu_tubuh'    => $request->suhu_tubuh
        ];
        tb_perjalanan::create($perjalanan);
        return redirect ('/perjalanan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_perjalanan)
    {
        $perjalanan = tb_perjalanan::findOrFail($id_perjalanan)
            ->delete();
        return back();
    }
}
