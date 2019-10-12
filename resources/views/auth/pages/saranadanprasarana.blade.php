@extends('auth.template')
@section('mainhome')
 <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form Sarana dan  Prasarana</h3>
    </div>
    <div class="panel-body">
@if(@count($tampil) > 0)
<form action="{{url('/home/upsaranadanprasarana/'.$tampil->id)}}" method="post" enctype="multipart/form-data">
@csrf @method('put')

@else
<<form action="{{url('/home/saranadanprasarana')}}" method="post" enctype="multipart/form-data">
@csrf
@endif
 <p>sarana dan prasarana</p>
@if(@count($tampil) > 0)
<textarea name="saranadanprasarana" class="ckeditor" id="ckeditor">{!!$tampil->saranadanprasarana!!}</textarea>
@else
<textarea name="saranadanprasarana" class="ckeditor" id="ckeditor"></textarea>
@endif
    <br>
    <input type="submit"  class="btn btn-default" value="Submit">
</form>

</div>
</div>
@endsection