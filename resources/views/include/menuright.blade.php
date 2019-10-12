     <label for="" class="labelapp">Post Popular</label>
     @foreach($popular as $p)
     <div class="content-popular">
     @if($p->fotoheader != '0')
        <img src="{{asset('/upload/fotoberita/'.$p->fotoheader)}}" style="width:70px;height:70px;margin-right:10px;" align="left" class="lingkaran">
      @endif
      Judul : {!! str_limit($p->judul,'20') !!} <br>
       <p align="right"><a href="{{ url('/singlepath/berita/'.$p->slug)}}">Selengkapnya >></a></p>
     </div>
     @endforeach
     <label for="" class="labelapp">Galeri</label>
     @foreach($galery as $g)
     <div  class="galeri-min">
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
     <video  style="width:100%;height:97px;" alt="{{$g->title}}" controls >
         <source src="{{ asset('upload/galery/'.$g->file) }}" type="video/mp4">
       </video >
     @else
       <img src="{{ asset('upload/galery/'.$g->file) }}" id="myImg{{$g->id}}" style="width:100%;height:97px;" alt="{{$g->title}}">
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