@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{url('/data')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                </p>
            </div>
            <div class="box-body">

                <form role="form" method="post" action="{{url('data/add')}}">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIK</label>
                      <input type="number" name="nik" class="form-control" id="exampleInputEmail1" placeholder="Masukkan NIK">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir</label>
                      <input type="text" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Lahir">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">jenis Kelamin</label>
                      <input type="text" name="jenis_kelamin" class="form-control" id="exampleInputEmail1" placeholder="Jenis Kelamin">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Penghasilan Bulanan</label>
                      <input type="number" name="penghasilan" class="form-control" id="exampleInputEmail1" placeholder="Penghasilan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">RT/RW</label>
                      <input type="text" name="rt_rw" class="form-control" id="exampleInputEmail1" placeholder="RT/RW">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Anak</label>
                      <input type="number" name="jumlah_anak" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Anak">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                      <input type="text" name="pendidikan_terakhir" class="form-control" id="exampleInputEmail1" placeholder="Pendidikan Terakhir">
                    </div>
                </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection