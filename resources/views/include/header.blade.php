<header>
<div class="freameHeader">
<img src="{{ asset('/upload/header/'.$header->foto)}}" style="width:100%;height: 280px;">
</div>
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <!-- Brand -->


 <!-- Toggler/collapsibe Button -->
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   <span class="navbar-toggler-icon"></span>
 </button>

 <!-- Navbar links -->
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <ul class="navbar-nav ">
     <li class="nav-item">
       <a class="nav-link" href="{{ url('/')}}">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="{{url('/public/profil')}}">Profil</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="{{url('/public/visidanmisi')}}">Visi dan Misi</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="{{ url('/public/saranadanprasarana')}}">Sarana dan Prasarana</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="{{url('/public/berita')}}">Berita</a>
     </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Data
        </a>
        <div class="dropdown-menu ">
          <a class="dropdown-item" href="{{url('/public/guru')}}">Guru</a>
          <a class="dropdown-item" href="{{url('/public/staf')}}">Staf</a>
        </div>
      </li>
     <li class="nav-item">
       <a class="nav-link" href="{{url('/public/galery')}}">Galery</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="{{url('/public/about')}}">About</a>
     </li>
     
   </ul>
 </div>
</nav>
</header>