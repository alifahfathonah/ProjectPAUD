<div class="">
       <label class="labelapp">Kata Sambutan</label>
       <div class="container-fluid">
         <center>
         <img src="{{ asset('/upload/fotokepalasekolah/'.$katasambutan->foto)}}" class="lingkaran"><br>
           <b>Nama : {{$katasambutan->nama}} </b><br>
           Jabatan : {{$katasambutan->jabatan}} <br>
           <i>{{ str_limit($katasambutan->katasambutan,'70')}}</i>
         </center>
       </div>
       <label class="labelapp">Login </label>
       <div class="container-fluid">
          <form method="POST" action="{{ route('login') }}" >
          @csrf
           <label for="">Email</label>
           <input type="email" name="email" class="form-control" placeholder="Email">
           <label for="">Password</label>
           <input type="password" name="password" class="form-control" placeholder="password"><br>
           <input type="submit" value="Submit" class="btn btn-default">
         </form>
       </div>
       <label for="" class="labelapp">Banner</label>
       <div class="container-fluid">
         @foreach($benner as $b)
          <a href="{{ $b->link }}">
             <img src="{{ asset('/upload/banner/'.$b->imgbanner)}}" style="width:100%; height:80px;">
          </a>
          <br><br>
         @endforeach
       </div>
       <label for="" class="labelapp">Link</label>
       <div class="container-fluid">
         <ul>
         @foreach($link as $l)
           <li><a href="{{ $l->link }}">{{ $l->title }}</a></li>
         @endforeach
         </ul>
       </div>
     </div>