@extends('auth.template')
@section('mainhome') 
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form Visi dan Misi</h3>
    </div>
    <div class="panel-body">
@if(@count($tampil) > 0)
<form action="{{url('/home/upvisidanmisi/'.$tampil->id)}}" method="post" enctype="multipart/form-data">
@csrf @method('put')
@else
<form action="{{url('/home/visidanmisi')}}" method="post" enctype="multipart/form-data">
@csrf
@endif
@if(@count($tampil) > 0)
<textarea name="visidanmisi" class="ckeditor" id="ckeditor">{!!$tampil->visidanmisi!!}</textarea>
@else
<textarea name="visidanmisi" class="ckeditor" id="ckeditor"></textarea>
@endif
<br>
<input type="submit"  class="btn btn-default" value="Submit">
</form>
</div>
</div>
@endsection