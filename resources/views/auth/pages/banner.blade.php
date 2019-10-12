
@extends('auth.template')
@section('mainhome')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form Banner</h3>
    </div>
    <div class="panel-body">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Benner</button>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Benner</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container-fluid">
			<form action="{{url('/home/banner')}}" method="post" enctype="multipart/form-data">
			@csrf
			    <p>Title</p>
			    <input type="text" name="title" class="form-control">
			    <p>link</p>
			    <input type="text" name="link" class="form-control">
			    <p>img banner</p>
			    <input type="file" name="imgbanner" class="form-control"><input type="hidden" name="status" value="Y">
			    <br>
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
<div class="container">
	<table class="table table-striped">
<thead>
  <tr>
    <th>No</th>
    <th>title</th>
    <th>link</th>
    <th>Foto </th>
    <th style="width:200px;">Action</th>
  </tr>
</thead>
<tbody>
@php($no = 1)
@foreach($tampil as $t)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$t->title}}</td>
    <td>{{$t->link}}</td>
    <td>
    <img src="{{asset('upload/banner/'.$t->imgbanner)}}" style="width:100%;height:150px;"> 
    </td>
    <td>
    <form action="{{ url('/home/delete/banner/'.$t->id)}}" method="post">
    @csrf @method('delete')
    	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myFoto{{$t->id}}">Edit</button>

    	<button type="submit" class="btn btn-warning">Hapus</button>

    </form>
    	    	<div class="modal fade" id="myFoto{{$t->id}}">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Update Banner</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        <div class="container-fluid">
			    <form action="{{url('/home/upbanner/'.$t->id)}}" method="post" enctype="multipart/form-data">
				@csrf @method('put')
				    <p>Title</p>
				    <input type="text" name="title" class="form-control" value="{{ $t->title}}">
				    <p>link</p>
				    <input type="text" name="link" class="form-control" value="{{ $t->link}}">
				    <p>img banner</p>
				    <input type="file" name="imgbanner" class="form-control"><input type="hidden" name="status" value="Y">
				    <br>
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