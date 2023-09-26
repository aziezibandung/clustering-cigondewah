@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <button class="btn btn-sm btn-flat btn-primary btn-filter"><i class="fa fa-filter"></i> Filter Tanggal </button>
                </p>
            </div>
            <div class="box-body">

            <div class="table-responsive">
                <table class="table table-stripped myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
            				<th>NIK</th>
            				<th>Tanggal Lahir</th>
            				<th>Jenis Kelamin</th>
            				<th>Pekerjaan</th>
            				<th>Penghasilan</th>
            				<th>Jumlah Anak</th>
            				<th>Pendidikan Terakhir</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $e=>$dt)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{$dt->nama}}</td>
                            <td>{{$dt->nik}}</td>
                            <td>{{$dt->tanggal_lahir}}</td>
                            <td>{{$dt->jenis_kelamin}}</td>
                            <td>{{$dt->pekerjaan}}</td>
                            <td>{{number_format($dt->penghasilan,0)}}</td>
                            <td>{{$dt->jumlah_anak}}</td>
                            <td>{{$dt->pendidikan_terakhir}}</td>
                            <td>{{$dt->prediksi}}</td>
                            <td>{{date('d-M-Y H:i:s',strtotime($dt->created_at))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
               
            </div>
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
  <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-gradient-danger">
 
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">

      <form role="form" method="get" action="{{url('laporan/filter')}}">
          @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Awal</label>
                  <input type="text" name="awal" class="form-control datepicker" id="exampleInputEmail1" autocomplete="off" value="{{$awal}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Akhir</label>
                  <input type="text" name="akhir" autocomplete="off" class="form-control datepicker" id="exampleInputPassword1" value="{{$akhir}}">
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

        $('.btn-filter').click(function(e){
            e.preventDefault();
            $('#modal-filter').modal();
        })
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection