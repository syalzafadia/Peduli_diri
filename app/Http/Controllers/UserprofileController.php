<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\tb_perjalanan;
use App\Provinsi;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use Storage;
use Auth;

class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('user.index',['provinsi'=>$provinsi]);
    }

    public function getKota(Request $request)
    {
        $kota = Kota::where("province_id",$request->province_id)->pluck('id','name');
        return response()->json($kota);
    }

    public function getKecamatan(Request $request){
        $kecamatan = Kecamatan::where("city_id",$request->city_id)->pluck('id','name');
        //dd($kecamatan);
        return response()->json($kecamatan);
    }

    public function getKelurahan(Request $request){
        $kelurahan = Kelurahan::where("district_id",$request->district_id)->pluck('id','name');
        return response()->json($kelurahan);
    }

     public function home()
    {
        $perjalanan = tb_perjalanan::all();
        return view('home',compact('perjalanan'));
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
    public function update(Request $request)
    {
        //dd($request->file('foto'));

        // $this->validate($request,[
        //     'foto' => 'required|images|mimes:jpeg,png,jpg|max:3000'
        // ]);

        if ($request->user()->foto) {
            Storage::delete($request->user()->foto);
        }

        $foto = $request->file('foto')->store('foto');

        $request->user()->update([
            'nik'           => $request->nik,
            'name'          => $request->name,
            'telp'          => $request->telp,
            'email'         => $request->email,
            'foto'          => $foto,
            'username'      => $request->username,
            'provinces_id'  => $request->provinsi,
            'cities_id'     => $request->kota,
            'districts_id'  => $request->kecamatan,
            'villages_id'   => $request->kelurahan,
            
        ]);

        return redirect()->back();
    }

    public function changepassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        
        if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
         //New password and confirm password are not same
          return redirect()->back()->with("error","New Password should be same as your confirmed password. Please retype new password.");
        }
         
        //Change Password
        
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->password_confirmation = bcrypt($request->get('new-password'));
        $user->save();
             
        return redirect()->back()->with("success","Password changed successfully !");
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
