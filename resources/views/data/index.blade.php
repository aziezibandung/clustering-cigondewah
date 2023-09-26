@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{url('data/add')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-refresh"></i> Tambah Data </a>
                </p>
            </div>
            <div class="box-body">

            	<div class="table-responsive">
            		<table class="table myTable">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Nama</th>
            					<th>NIK</th>
            					<th>Tanggal Lahir</th>
            					<th>Jenis Kelamin</th>
            					<th>Pekerjaan</th>
            					<th>Penghasilan</th>
            					<th>Alamat</th>
            					<th>RT/RW</th>
            					<th>Jumlah Anak</th>
            					<th>Pendidikan Terakhir</th>
                                <th>Status</th>
                                <th>Pilihan</th>
								<th>Prediksi</th>
            				</tr>
            				<tbody>
            					@foreach($data as $e=>$dt)
            					<tr>
            						<td>{{$e+1}}</td>
            						<td>{{$dt->nama}}</td>
            						<td>{{$dt->nik}}</td>
            						<td>{{$dt->tanggal_lahir}}</td>
            						<td>{{$dt->jenis_kelamin}}</td>
            						<td>{{$dt->pekerjaan}}</td>
            						<td>{{$dt->penghasilan}}</td>
            						<td>{{$dt->alamat}}</td>
            						<td>{{$dt->rt_rw}}</td>
            						<td>{{$dt->jumlah_anak}}</td>
            						<td>{{$dt->pendidikan_terakhir}}</td>
                                    <td>
                                        @if($dt->prediksi == null)
                                        <span class="btn btn-warning">Belum Prediksi</span>
                                        @elseif($dt->prediksi == "Tidak Layak")
                                        <span class="btn btn-danger">{{$dt->prediksi}}</span>
                                        @elseif($dt->prediksi == "Layak")
                                        <span class="btn btn-success">{{$dt->prediksi}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="width:60px"><a href="{{url('data/'.$dt->id)}}"class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                        <button href="{{url('data/'.$dt->id)}}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button></div>
                                    </td>
									<td>
                                        <!-- <button href="{{url('datas/'.$dt->id)}}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button></div></td> -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#predict{{$dt->id}}">
										Prediksi
										</button>
            					</tr>
            					@endforeach
            				</tbody>
            			</thead>
            		</table>
            	</div>
               
            </div>
        </div>
    </div>
</div>

@foreach($data as $e=>$dt)
<!-- Modal -->
<div class="modal fade" id="predict{{$dt->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Prediksi Bansos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- form predict -->
	  <form action="{{url('data/'.$dt->id)}}" method="post">
          @csrf 
        {{ method_field('PUT')}}
      <div class="mb-3">
        <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
        <input readonly type="text" class="form-control" id="jumlah_anak{{$dt->id}}" value="{{$dt->jumlah_anak}}" placeholder="Masukkan Jumlah Anak">
      </div>
      <div class="mb-3">
        <label for="penghasilan" class="form-label">Penghasilan</label>
        <input readonly type="text" class="form-control" id="penghasilan{{$dt->id}}" value="{{$dt->penghasilan}}" placeholder="Masukkan Penghasilan">
      </div>
	  
	  <div id="predict_list{{$dt->id}}">
        </div>
		<br>
      <div id="save_predict{{$dt->id}}"></div>
      <br>
      <div>
      <button type="button" class="btn btn-primary"data-dismiss="modal" >Batal</button>
      </div>
      </div>
      </form>

      <div class="modal-footer">
      <button class="btn btn-primary" id="button_predict{{$dt->id}}">Prediksi</button>
        
      </div>
    </div>
  </div>
</div>
@endforeach
 
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

	//get url api
let url_api = "https://web-production-166b.up.railway.app/api/predict"
//get url api
let data_bansos = {!!json_encode($data)!!}

// Function to fetch data all method GET, POST, PUT, and DELETE
function myFetch(url, type, data) {
    //GET
    if (type === "GET") {
    return fetch(url, {
    method: type,
    headers: {
        'Content-type': 'application/json'
    }
    })
    .then(res => {
        if (res.ok) { console.log("HTTP request successful") }
        else { console.log("HTTP request unsuccessful") }
        return res
    })
    .then(res => res.json())
    .then(data => data)
    .catch(error => error)
    }
  
    //DELETE
    if (type === "DELETE") {
    return fetch(url, {
    method: type,
    headers: {
        'Content-type': 'application/json'
    }
    })
    .then(res => {
        if (res.ok) { console.log("HTTP request successful") }
        else { console.log("HTTP request unsuccessful") }
        return res
    })
    .catch(error => error)
    }
  
    //POST or PUT
    if (type === "POST" | type === "PUT") {
    return fetch(url, {
    method: type,
    mode: 'cors', 
    cache: 'no-cache', 
    credentials: 'same-origin', 
    redirect: 'follow', 
    referrerPolicy: 'no-referrer',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
    })
    .then(res => {
        if (res.ok) { console.log("HTTP request successful") }
        else { console.log("HTTP request unsuccessful") }
        return res
    })
    .then(res => res.json())
    .then(data => data)
    .catch(error => error)
    }
}
// Function to fetch data all method GET, POST, PUT, and DELETE

 

for (let i = 0; i < data_bansos.length; i++) {
    let user_id = data_bansos[i].id
    console.log()
    console.log(data_bansos[i].nama)
    //get element by id
    //get element by id

    // function to clear data
function clearTodo(){
    // refresh value
    document.getElementById(`jumlah_anak${user_id}`).value = ""
    document.getElementById(`penghasilan${user_id}`).value = ""
}
// function to clear data

// Button to insert 
document.getElementById(`button_predict${user_id}`).addEventListener("click", function() {
    console.log(document.getElementById(`jumlah_anak${user_id}`).value)
    console.log(document.getElementById(`penghasilan${user_id}`).value)
    // validasi input
    if (document.getElementById(`jumlah_anak${user_id}`).value == "" || document.getElementById(`penghasilan${user_id}`).value == "") {
        // alert failed
        alert("Masukkan Jumlah Anak dan Penghasilan")
    }else{
            myFetch(url_api, "POST",[{
                jumlah_anak: document.getElementById(`jumlah_anak${user_id}`).value ,
                penghasilan: document.getElementById(`penghasilan${user_id}`).value
               }]).then(res => document.getElementById(`predict_list${user_id}`).innerHTML = `<div class="mb-3">
        <label for="prediksi" class="form-label">Prediksi</label>
        <input readonly type="text" class="form-control" value="${res}" id="predict_list${user_id}" name="prediksi" placeholder="Masukkan Prediksi">
      </div>`)           
    } 
    
    document.getElementById(`save_predict${user_id}`).innerHTML = `<div>
      <button type="submit" class="btn btn-success">Simpan</button>
      </div>`
})
// Button to insert
}


</script>
 
@endsection