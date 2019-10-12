@extends('template')
@section('main')
<div class="row">
   <div class="col-md-3">
     @include('include.menuleft')
   </div>
   <div class="col-md-6">
     <div class="slideshow">
      <div id="demo" class="carousel slide" data-ride="carousel">
        
        <div class="carousel-inner">
         @foreach($berita1 as $b)
         @if($b->fotoheader != '0')
          <div class="carousel-item satu  ">
            <img src="{{asset('/upload/fotoberita/'.$b->fotoheader)}}" alt="{!! $b->judul !!}" style="width:100%;height:280px;">
            <div class="carousel-caption">
              <h3>{!! str_limit($b->judul,'20') !!}</h3>
            </div>   
          </div>
          @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
      
     </div>
     @foreach($berita as $b)
     <div class="content">
     @if($b->fotoheader != '0')
      <img src="{{asset('/upload/fotoberita/'.$b->fotoheader)}}" style="width:100px;height:100px;margin-right:20px;" align="left">
     @endif
     Judul : {!! str_limit($b->judul,'55') !!} <br>
     {!! str_limit($b->deskripsi,'115') !!}
     <p align="right"><a href="{{ url('/singlepath/berita/'.$b->slug)}}">Selengkapnya >></a></p>
     </div>
     @endforeach
     <label for=""class="labelapp">Album</label>
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
   </div>
   <div class="col-md-3">
     @include('include.menuright')
   </div>
</div>
@endsection