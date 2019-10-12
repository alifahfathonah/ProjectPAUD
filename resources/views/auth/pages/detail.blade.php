@extends('auth.template')
@section('mainhome')
 <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form detail Galery</h3>
    </div>
    <div class="panel-body">
<div class="container-fluid">
	  <table class="table table-striped">
<thead>
  <tr>
    <th>No</th>
    <th>Title</th>
    <th>Type</th>
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
    <td>{{$t->type}}</td>
    <td>@if($t->type == '1')
    	<video  style="width:100%;height:150px;"  controls >
         <source  src="{{ asset('upload/galery/'.$t->file) }}" type="video/mp4">
       </video >
       @else
    <img src="{{asset('upload/galery/'.$t->file)}}" style="width:100%;height:150px;"> @endif
    </td>
    <td>
    <form action="{{ url('/home/lihat/galery/'.$t->id)}}" method="post">
    @csrf @method('delete')
        <button type="submit" class="btn btn-warning">Hapus</button>
    </form>        
    </td>
  </tr>
 @endforeach
</table>
</div>

</div>
</div>
@endsection