@extends('auth.template')
@section('mainhome')
 <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form Berita</h3>
    </div>
    <div class="panel-body">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Berita</button> <br><br>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Berita</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
        <div class="container-fluid">
			<form action="{{url('/home/berita')}}" method="post" enctype="multipart/form-data">
			@csrf
			    <p>Judul</p>
			    <input type="text" name="judul" class="form-control" maxlength="100" value="{{ old('judul')}}">
			    <p>deskripsi</p>
			    <textarea maxlength="255" name="deskripsi" class="form-control">{{ old('deskripsi')}}</textarea>
			    <p>isi</p>
			    <textarea name="isi"  class="ckeditor" id="ckeditor">{{ old('isi')}}</textarea>
			    <p>foto header</p>
			    <input type="file" name="fotoheader" class="form-control"> <br> <input type="hidden" name="status" value="Y"><input type="hidden" name="popular" value="0">
			    <input type="submit"  class="btn btn-default" value="Submit">
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
<div class="container-fluid">
	<table class="table table-striped">
<thead>
  <tr>
    <th>No</th>
    <th>Judul</th>
    <th>Deskripsi</th>
    <th >Foto </th>
    <th style="width:200px;">Action</th>
  </tr>
</thead>
<tbody>
@php($no = 1)
@foreach($tampil as $t)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$t->judul}}</td>
    <td>{{$t->deskripsi}}</td>
    <td>@if($t->fotoheader == '0')<h2>foto tidak ada</h2>@else
    <img src="{{asset('upload/fotoberita/'.$t->fotoheader)}}" style="width:60%;height:150px;"> @endif
    </td>
    <td>
    <form action="{{ url('/home/delete/berita/'.$t->id)}}" method="post">
    @csrf @method('delete')
    	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myFoto{{$t->id}}">Edit</button>

    	<button type="submit" class="btn btn-warning">Hapus</button>

    </form>
    	    	<div class="modal fade" id="myFoto{{$t->id}}">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Update Berita</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        <div class="container-fluid">
		        <form action="{{url('/home/upberita/'.$t->id)}}" method="post" enctype="multipart/form-data">
				@csrf @method('put')
			    <p>Judul</p>
			    <input type="text" name="judul" value="{{$t->judul}}" maxlength="100" class="form-control">
			    <p>deskripsi</p>
			    <textarea name="deskripsi" class="form-control" maxlength="255">{{$t->deskripsi}}</textarea>
			    <p>isi</p>
			    <textarea name="isi" class="ckeditor" id="ckeditor">{{$t->isi}}</textarea>
			    <p>foto header</p>
			    <input type="file" name="fotoheader" class="form-control"> <br> <input type="hidden" name="status" value="Y"><input type="hidden" name="popular" value="0">
			    <input type="submit"  class="btn btn-default" value="Submit">
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