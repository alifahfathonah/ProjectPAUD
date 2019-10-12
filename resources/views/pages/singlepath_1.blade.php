@extends('template')
@section('main')
<div class="row">
   <div class="col-md-9">
   @if($kondisi == 'berita')
     @foreach($berita as $b)
     <div class="content">
     @if($b->fotoheader != '0')
      <img src="{{asset('/upload/fotoberita/'.$b->fotoheader)}}" style="width:100px;height:100px;margin-right:20px;" align="left">
     @endif
     Judul : {!! $b->judul !!} <br>
     {!! $b->deskripsi !!}
     <p align="right"><a href="{{ url('/singlepath/berita/'.$b->slug)}}">Selengkapnya >></a></p>
     </div>
     @endforeach
     <p>
     	{!! $berita->links() !!}
     </p>


     @elseif($kondisi == 'galery')


      @foreach($album as $al)
     <div class="container-fluid">
       <div class="content">
         <div class="row">
           <div class="col-md-9">
             <p>Judul Album : {{ $al->judul}}</p>
             <p>Tanggal </p>
             <h3>{{ date('d-m-Y', strtotime($al->tanggal))}}</h3>
           </div>
           <div class="col-md-3">
             <h3 align="center">Jumlah</h3>
             <h2 align="center">
               @php($file=DB::table('galery_models')->where('id_album',$al->id)->get())
      {{ @count($file)}}
             </h2>
             <p align="center"><a href="{{ url('/singlepath/album/'.$al->slug)}}">lihat</a></p>
           </div>
         </div>
       </div>
     </div>
     @endforeach
     <p>
     	{!! $album->links() !!}
     </p>

     @elseif($kondisi == 'singlepath/berita')
     <h1>Judul : {!! $berita->judul !!}</h1>
     <br>
     {!! $berita->isi !!}
     @elseif($kondisi == 'singlepath/biodata')
     <div class="container">
       <img src="{{ asset('upload/datagurudanstaf/'.$datagurudanstaf->foto)}}" align="left" style="width:250px; height: 280px;margin-right: 10px;">
       <div class="container">
        <h2>Biodata</h2>
         <table>
           <tr>
             <th>Nama</th>
             <td>:</td>
             <td>{{ $datagurudanstaf->nama }}</td>
           </tr>
           <tr>
             <th>Tempat/tanggal lahir</th>
             <td>:</td>
             <td>{{ $datagurudanstaf->tempat }}/{{ date('d-m-Y', strtotime($datagurudanstaf->tgllahir)) }}</td>
           </tr>
           <tr>
             <th>No Hp</th>
             <td>:</td>
             <td>{{ $datagurudanstaf->nohp }}</td>
           </tr>
           <tr>
             <th>Alamat</th>
             <td>:</td>
             <td>{{ $datagurudanstaf->alamat }}</td>
           </tr>
         </table>
       </div>
     </div>

     @endif
   </div>
   <!-- ======================================== -->
   <div class="col-md-3">
    @include('include.menuright')
   </div>
</div>
@endsection