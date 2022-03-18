<?php

namespace App\Http\Controllers;

use App\Provinsi;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function index(){
        $provinsi = Provinsi::all();
        return view('dropdown',['page_title'=>'Daftar Provinsi','provinsi'=>$provinsi]);
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
}
