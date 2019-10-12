@extends('auth.template')
@section('mainhome')
 <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form Galery</h3>
    </div>
    <div class="panel-body">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ album</button>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Allbum</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container-fluid">
			<form action="{{url('/home/galery')}}" method="post"> @csrf
        <p>judul album</p>
      <input type="text" name="judul" class="form-control">
      <p>Tanggal</p>
      <input type="date" name="tanggal" class="form-control"><input type="hidden" name="status" value="Y">
      <br>
      <input type="submit" class="btn btn-default">   
      </form>
		</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<div class="container">
	<table class="table table-striped">
<thead>
  <tr>
    <th>No</th>
    <th>Judul</th>
    <th>Tanggal</th>
    <th>File</th>
    <th >Action</th>
  </tr>
</thead>
<tbody>
@php($no = 1)
@foreach($tampil as $t)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $t->judul }}</td>
    <td>{{ $t->tanggal }}</td>
    <td>
      @php($file=DB::table('galery_models')->where('id_album',$t->id)->get())
      <a href="{{url('/home/lihat/galery/'.$t->slug)}}">{{ @count($file)}}</a>
    </td>
    <td>
    <form action="{{ url('/home/delete/galery/'.$t->id)}}" method="post">
    @csrf @method('delete')
    	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myFoto{{$t->id}}">Input</button>
    	
    	<button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myupFoto{{$t->id}}">Edit</button>
    	<button type="submit" class="btn btn-warning">Hapus</button>

    </form>
      <div class="modal fade" id="myupFoto{{$t->id}}">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Album</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
           <form action="{{url('/home/upgalery/'.$t->id)}}" method="post"> @csrf @method('put')
              <p>judul album</p>
            <input type="text" name="judul" class="form-control" value="{{$t->judul}}">
            <p>Tanggal</p>
            <input type="date" name="tanggal" class="form-control"  value="{{$t->tanggal}}"><input type="hidden" name="status" value="Y">
            <br>
            <input type="submit" class="btn btn-default">   
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>


    	     <div class="modal fade" id="myFoto{{$t->id}}">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambahkan Foto/Video pada Album</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="container-fluid">
         <form action="{{ url('/home/sgalery')}}" enctype="multipart/form-data" method="post"> @csrf
            <p>Title</p>
            <input type="hidden" name="idalbum" value="{{$t->id}}">
            <input type="text" name="title" class="form-control">
            <p>Type</p>
            <p>
              <input type="radio" name="type" value="0" checked>Foto
              <input type="radio" name="type" value="1">Video
            </p>
            <p>Foto</p>
            <input type="file" name="file" class="form-control">
            <br>
            <input type="submit" class="btn btn-default">
         </form>
        </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    </td>
  </tr>
@endforeach
</table>
</div>
</div>
</div>
 @endsection