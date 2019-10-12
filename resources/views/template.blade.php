<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
    href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet"
    href="{{ asset('/css/style.css')}}">
    <link rel="stylesheet"
    href="{{ asset('/css/w3.css')}}">
    <script src="{{asset('/js/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
    <script src="{{asset('/js/ajax/libs/popper.js')}}"></script>
    <script src="{{ asset('/js/app.js')}}"></script>
    <script>
      $(document).ready(function(){
          $(".satu:first").addClass("active");
      });
      </script>
  </head>
  <body>
    <div class="wrepper ">
@include('include.header')
@include('include.sidebar')
@include('include.footer')
    </div>
  </body>
</html>








