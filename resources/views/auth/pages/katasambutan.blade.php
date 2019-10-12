@extends('auth.template')
@section('mainhome')
 <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form Kata Sambutan</h3>
    </div>
    <div class="panel-body">
@if(@count($tampil) > 0)
<form action="{{url('/home/upkatasambutan/'.$tampil->id)}}" method="post" enctype="multipart/form-data">@csrf @method('put')
 <p>Nama</p>
    <input type="text" name="nama" class="form-control" value="{{ $tampil->nama}}">
    <p>kata sambutan kepala sekolah</p>
    <textarea class="form-control" name="katasambutan">{{ $tampil->katasambutan}}</textarea> <input type="hidden" name="jabatan" value="Kepala Sekolah">
    <p>Foto</p>
    <p>
    	<img src="{{asset('upload/fotokepalasekolah/'.$tampil->foto)}}" style="width:150px;height:150px;">
    </p>
    <input type="file" name="foto" class="form-control">
    <br>
    <input type="submit"  class="btn btn-default" value="Submit">
</form>
@else
<form action="{{url('/home/katasambutan')}}" method="post" enctype="multipart/form-data">@csrf
@csrf
 <p>Nama</p>
    <input type="text" name="nama" class="form-control">
    <p>kata sambutan kepala sekolah</p>
    <textarea class="form-control" name="katasambutan"></textarea> <input type="hidden" name="jabatan" value="Kepala Sekolah">
    <p>Foto</p>
    <input type="file" name="foto" class="form-control">
    <br>
    <input type="submit"  class="btn btn-default" value="Submit">
</form>
@endif

</div>
</div>
@endsection