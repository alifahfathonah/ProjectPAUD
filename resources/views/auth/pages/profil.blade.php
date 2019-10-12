@extends('auth.template')
@section('mainhome') 
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form Profil</h3>
    </div>
    <div class="panel-body">
@if(@count($tampil) > 0)
<form action="{{url('/home/upprofil/'.$tampil->id)}}" method="post" enctype="multipart/form-data">
@csrf @method('put')
@else
<form action="{{url('/home/profil')}}" method="post" enctype="multipart/form-data">
@csrf
@endif
<p>profil</p>
@if(@count($tampil) > 0)
<textarea name="profil" class="ckeditor" id="ckeditor">{!!$tampil->profil!!}</textarea>
@else
<textarea name="profil" class="ckeditor" id="ckeditor"></textarea>
@endif
<br>
<input type="submit"  class="btn btn-default" value="Submit">
</form>
</div>
</div>
@endsection