<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Halaman Admin</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/admin/css/theme-default.css')}}"/>
        <!-- <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('/css/app.css')}}"/> -->
        <script type="text/javascript" src="{{ asset('/ckeditor/ckeditor.js')}}"></script>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{url('/home/')}}"> {{ auth()->user()->name}}</a>
                        <a href="#" class="x-navigation-control"></a>

                    </li>                                                                      
                    
                    <li><a href="{{url('/home/edit/user/root')}}"><span class="fa  fa-users"></span> <span class="xn-text">AkunKu</span></a></li> 
                    <li><a href="{{url('/home/')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Home</span></a></li>
					<li><a href="{{url('/home/header')}}"><span class="fa fa fa-picture-o"></span> <span class="xn-text">Foto Header</span></a></li>
					<li><a href="{{url('/home/berita')}}"><span class="fa fa-globe"></span> <span class="xn-text">Berita</span></a></li>
                    <li><a href="{{url('/home/profil')}}"><span class="fa fa-globe"></span> <span class="xn-text">profil</span></a></li>
					<li><a href="{{url('/home/visidanmisi')}}"><span class="fa fa-globe"></span> <span class="xn-text">Visi dan Misi</span></a></li>
					<li><a href="{{url('/home/saranadanprasarana')}}"><span class="fa fa-building-o"></span> <span class="xn-text">sarana dan prasarana</span></a></li>
					<li><a href="{{url('/home/banner')}}"><span class="fa fa fa-picture-o"></span> <span class="xn-text">banner</span></a></li>
					<li><a href="{{url('/home/link')}}"><span class="fa fa-code-fork"></span> <span class="xn-text">link</span></a></li>
					<li><a href="{{url('/home/galery')}}"><span class="fa  fa-picture-o"></span> <span class="xn-text">galery</span></a></li>
					<li><a href="{{url('/home/katasambutan')}}"><span class="fa fa-globe"></span> <span class="xn-text">Kata Sambutan</span></a></li>
					<li><a href="{{url('/home/dataguru')}}"><span class="fa  fa-users"></span> <span class="xn-text">data guru</span></a></li>
                    <li><a href="{{url('/home/datastaf')}}"><span class="fa  fa-users"></span> <span class="xn-text">data staf</span></a></li>                            
					                           
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content" >
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li>
                    <!-- END TOGGLE NAVIGATION -->                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <!-- <ul class="breadcrumb">
                    <li><a href="#">Link</a></li>                    
                    <li class="active">Active</li>
                </ul> -->
                <!-- END BREADCRUMB -->                
               
               <!--  <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Page Title</h2>
                </div>                   
                 -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" >
                
                    <!-- <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Title</h3>
                                </div>
                                <div class="panel-body">
                                    Panel body
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <div class="container" >
                    	 <br>
						@include('pesan')
						@yield('mainhome')
					</div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>      
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>         -->
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ asset('/admin/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/admin/js/actions.js')}}"></script>       


        <!-- END TEMPLATE -->
         <!-- START SCRIPTS -->
     

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{ asset('/js/plugins/icheck/icheck.min.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        
        <script type="text/javascript" src="{{ asset('/js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/plugins/morris/morris.min.js')}}"></script>       
        <script type="text/javascript" src="{{ asset('/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
        <script type='text/javascript' src="{{ asset('/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{ asset('/js/plugins/owl/owl.carousel.min.js')}}"></script>                 
        
        <script type="text/javascript" src="{{ asset('/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ asset('/js/settings.js')}}"></script>
        
        
        
        <script type="text/javascript" src="{{ asset('/js/demo_dashboard.js')}}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    <!-- END SCRIPTS -->         
    </body>
</html>


