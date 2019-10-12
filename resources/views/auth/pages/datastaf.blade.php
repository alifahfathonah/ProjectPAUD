
@extends('auth.template')
@section('mainhome')
 <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Form data Staf</h3>
    </div>
    <div class="panel-body">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Staf</button>
<br><br>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Data Guru</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container-fluid">
           <form action="{{url('/home/datagurudanstaf')}}" method="post" enctype="multipart/form-data">
            @csrf
                <p>Nama</p>
                <input type="text" name="nama" class="form-control">
                <p>Tempat lahir</p>
                <input type="text" name="tempat" class="form-control">
                <p>TGL Lahir</p>
                <input type="date" name="tgllahir" class="form-control">
                <p>alamat</p>
                <textarea class="form-control" name="alamat"></textarea>
                <p>No Hp</p>
                <input type="text" name="nohp" class="form-control"><input type="hidden" name="level" value="1">
                <p>Foto</p>
                <input type="file" name="foto" class="form-control">
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
    <th>Nama</th>
    <th>Tempat dan TGL Lahir</th>
    <th>No Hp </th>
    <th>Alamat </th>
    <th >Foto </th>
    <th style="width:200px;">Action</th>
  </tr>
</thead>
<tbody>
@php($no = 1)
@foreach($tampil as $t)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$t->nama}}</td>
    <td>{{$t->tempat}} / {{$t->tgllahir}}</td>
    <td>{{$t->nohp}}</td>
    <td>{{$t->alamat}}</td>
    <td>@if($t->fotoheader == '0')<h2>foto tidak ada</h2>@else
    <img src="{{asset('upload/datagurudanstaf/'.$t->foto)}}" style="width:100%;height:150px;"> @endif
    </td>
    <td>
    <form action="{{ url('/home/delete/datagurudanstaf/'.$t->id)}}" method="post">
    @csrf @method('delete')
        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myFoto{{$t->id}}">Edit</button>

        <button type="submit" class="btn btn-warning">Hapus</button>

    </form>
                <div class="modal fade" id="myFoto{{$t->id}}">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update Data Guru</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div class="container-fluid">
                <form action="{{url('/home/updatagurudanstaf/'.$t->id)}}" method="post" enctype="multipart/form-data">
                @csrf @method('put')
                    <p>Nama</p>
                    <input type="text" name="nama" class="form-control"  value="{{ $t->nama}}">
                    <p>Tempat lahir</p>
                    <input type="text" name="tempat" class="form-control" value="{{ $t->tempat}}">
                    <p>TGL Lahir</p>
                    <input type="date" name="tgllahir" class="form-control" value="{{ $t->tgllahir}}">
                    <p>alamat</p>
                    <textarea class="form-control" name="alamat">{{ $t->alamat}}</textarea>
                    <p>No Hp</p>
                    <input type="text" name="nohp" class="form-control" value="{{ $t->nohp}}"><input type="hidden" name="level" value="1">
                    <p>Foto</p>
                    <input type="file" name="foto" class="form-control">
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