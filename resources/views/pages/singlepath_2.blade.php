@extends('template')
@section('main')
<div class="row">
   <div class="col-md-3">
     @include('include.menuleft')
   </div>
   <!-- ====================================== -->
   <div class="col-md-9">
   		<div class="container-fluid">
        <br>
   			@if($kondisi == 'profil')
        {!! $profil->profil !!}
        @elseif($kondisi == 'saranadanprasarana')
         {!! $saranadanprasarana->saranadanprasarana !!}
        @elseif($kondisi == 'guru')

          @foreach($datagurudanstaf as $da)
            @if($da->level != '1')
          <div style="overflow:hidden">
             <div class="w3-card-2 w3-light-grey" style="width:32%; margin:5px; float:left">

              <div class="w3-container w3-center">
                <h3>{{$da->nama}}</h3>
                <img src="{{ asset('/upload/datagurudanstaf/'.$da->foto)}}" alt="Avatar" style="width:160px; height:200px;">
                <h5>{{$da->tempat}}/{{ date('d-m-Y', strtotime($da->tgllahir))}}</h5>

                <div class="w3-section">
                  <a href="{{url('/singlepath/biodata/'.$da->slug)}}" class="w3-button w3-green">Lihat</a>
                </div>
              </div>

            </div>

          </div>
          @endif
          @endforeach
        @elseif($kondisi == 'staf')
          @foreach($datagurudanstaf as $da)
            @if($da->level != '0')
          <div style="overflow:hidden">
             <div class="w3-card-2 w3-light-grey" style="width:32%; margin:5px; float:left">

              <div class="w3-container w3-center">
                <h3>{{$da->nama}}</h3>
                <img src="{{ asset('/upload/datagurudanstaf/'.$da->foto)}}" alt="Avatar" style="width:160px; height:200px;">
                <h5>{{$da->tempat}}/{{ date('d-m-Y', strtotime($da->tgllahir))}}</h5>

                <div class="w3-section">
                  <a href="{{url('/singlepath/biodata/'.$da->slug)}}" class="w3-button w3-green">Lihat</a>
                </div>
              </div>

            </div>

          </div>
          @endif
          @endforeach
        @elseif($kondisi == 'singlepath/album')
         @foreach($galery as $g)
     <div  class="galeri-single">
     
     <style type="text/css">
       /* The Close Button */
      .close{{$g->id}} {
          position: absolute;
          top: 15px;
          right: 35px;
          color: #f1f1f1;
          font-size: 40px;
          font-weight: bold;
          transition: 0.3s;
      }

      .close{{$g->id}}:hover,
      .close{{$g->id}}:focus {
          color: #bbb;
          text-decoration: none;
          cursor: pointer;
      }
      #caption{{$g->id}} {
          margin: auto;
          display: block;
          width: 80%;
          max-width: 700px;
          text-align: center;
          color: #ccc;
          padding: 10px 0;
          height: 150px;
      }
     </style>
     @if($g->type == '1')
     <video  style="width:100%;height:150px;" alt="{{$g->title}}" controls >
         <source src="{{ asset('upload/galery/'.$g->file) }}" type="video/mp4">
       </video >
     @else
       <img src="{{ asset('upload/galery/'.$g->file) }}" id="myImg{{$g->id}}" style="width:100%;height:150px;" alt="{{$g->title}}">
    @endif
       <!-- The Modal -->
          <div id="myModal{{$g->id}}" class="modal">

            <!-- The Close Button -->
            <span class="close{{$g->id}}">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img01{{$g->id}}">

            <!-- Modal Caption (Image Text) -->
            <div id="caption{{$g->id}}"></div>
          </div>
        <script type="text/javascript">
          // Get the modal
          var modal = document.getElementById('myModal{{$g->id}}');

          // Get the image and insert it inside the modal - use its "alt" text as a caption
          var img = document.getElementById('myImg{{$g->id}}');
          var modalImg = document.getElementById("img01{{$g->id}}");
          var captionText = document.getElementById("caption{{$g->id}}");
          img.onclick = function(){
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
          }

          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close{{$g->id}}")[0];

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() { 
              modal.style.display = "none";
          }
        </script>
    
     </div>
     @endforeach

        @elseif($kondisi == 'visidanmisi')
        {!! $visidanmisi->visidanmisi !!}
        @elseif($kondisi == 'about')
        ini adalah about
        @endif
   		</div>
   </div>
@endsection