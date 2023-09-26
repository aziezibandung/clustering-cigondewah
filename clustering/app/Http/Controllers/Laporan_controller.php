<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_data;

class Laporan_controller extends Controller
{
    public function index(){
        $title = "Laporan Data Masyarakat";
        $data = M_data::orderBy('created_at','desc')->get();
        $awal = date('Y-m-d',strtotime('-1 days'));
        $akhir = date('Y-m-d');

        return view('laporan.index',compact('title','data','awal','akhir'));
    }
    public function filter(Request $request){
        $awal = date('Y-m-d',strtotime($request->awal));
        $akhir = date('Y-m-d',strtotime($request->akhir));

        $title = "Laporan Data Masyarakat";
        $data = M_data::whereDate('created_at','>=',$awal)->whereDate('created_at','<=',$akhir)->orderBy('created_at','desc')->get();

        return view('laporan.index',compact('awal','akhir','title','data'));
    }
}
