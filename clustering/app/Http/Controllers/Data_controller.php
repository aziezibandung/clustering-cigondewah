<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\M_data;

class Data_controller extends Controller
{
    public function index(){
        $title = 'Master Data Masyarakat';
        $data = DB::table('m_data')->get();

        return view('data.index',compact('title','data'));
    }
    public function add(){
        $title = 'Tambah Data Masyarakat';

        return view('data.add',compact('title'));
    }

    public function store(Request $request){
        // $this->validate($request,[
        // 'nama'=>'required',
        // 'nik'=>'required',
        // 'tanggal_lahir'=>'required',
        // 'jenis_kelamin'=>'required',
        // 'pekerjaan'=>'required',
        // 'penghasilan'=>'required',
        // 'alamat'=>'required',
        // 'rt_rw'=>'required',
        // 'jumlah_anak'=>'required',
        // 'pendidikan_terakhir'=>'required'
        // ]);

        try{
        $a['nama'] = $request->nama;
        $a['nik'] = $request->nik;
        $a['tanggal_lahir'] = $request->tanggal_lahir;
        $a['jenis_kelamin'] = $request->jenis_kelamin;
        $a['pekerjaan'] = $request->pekerjaan;
        $a['penghasilan'] = $request->penghasilan;
        $a['alamat'] = $request->alamat;
        $a['rt_rw'] = $request->rt_rw;
        $a['jumlah_anak'] = $request->jumlah_anak;
        $a['pendidikan_terakhir'] = $request->pendidikan_terakhir;
        $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');


        DB::table('m_data')->insert($a);
            \Session::flash('sukses','Data berhasil ditambahkan');
        }catch(Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('data');
    }
    public function edit($id){
        $title = 'Edit Data';
        $dt = M_data::find($id);

        return view('data.edit',compact('title','dt'));
    }
     public function update(Request $request, $id){
        // $this->validate($request,[
        // 'nama'=>'required',
        // 'nik'=>'required',
        // 'tanggal_lahir'=>'required',
        // 'jenis_kelamin'=>'required',
        // 'pekerjaan'=>'required',
        // 'penghasilan'=>'required',
        // 'alamat'=>'required',
        // 'rt_rw'=>'required',
        // 'jumlah_anak'=>'required',
        // 'pendidikan_terakhir'=>'required'   
        // ]);

        
        if (isset($request->prediksi) == true) {
            $a['prediksi'] = $request->prediksi;
        }else{
            $a['nama'] = $request->nama;
            $a['nik'] = $request->nik;
            $a['tanggal_lahir'] = $request->tanggal_lahir;
            $a['jenis_kelamin'] = $request->jenis_kelamin;
            $a['pekerjaan'] = $request->pekerjaan;
            $a['penghasilan'] = $request->penghasilan;
            $a['alamat'] = $request->alamat;
            $a['rt_rw'] = $request->rt_rw;
            $a['jumlah_anak'] = $request->jumlah_anak;
            $a['pendidikan_terakhir'] = $request->pendidikan_terakhir;
        }
        // $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');


        M_data::where('id',$id)->update($a);

        \Session::flash('sukses','Data Berhasil Diupdate');

        return redirect('data');
    }
    public function delete($id){
         try{
            M_data::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');
        } catch (Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('data');
    }
}