<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- IE compapility -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- first mobile meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Medical Care Service - @yield('title')</title>


        <!-- font awesome -->
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">

        <!-- Bootstrap core CSS -->
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ URL::asset('css/adminboard.css') }}" rel="stylesheet">

    @yield('css')

        <!--[if lt IE 9]>
        <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
        <![endif]-->
        
        <script src="{{ URL::asset('js/respond-1.4.2.min.js') }}"></script>


        <!-- jquery & bootstrap requirements -->
        <script src="{{ URL::asset('js/jquery-3.2.1.slim.min.js') }}"></script>
        <script src="{{ URL::asset('js/popper.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

  </head>

    <!-- body starts here -->
    <body>

        <div class="container-fluid">
        @include('layouts.admin-nav')
            <div class="container">
                <div class="row">
                    
                    
                    @yield('content')
                </div>
                    @if ($flash = session('message'))
                        <div id="flash" class="alert alert-success" role="alert">
                            
                            <b>{{ $flash }}</b>

                        </div>
                    @elseif ($flash = session('error-msg'))
                        <div id="flash" class="alert alert-danger" role="alert">
                            
                            <b>{{ $flash }}</b>

                        </div>

                    @endif

                
            </div>
        </div>



        @yield('js')
        <script type="text/javascript">
            $('#flash').delay(7000).fadeOut("slow");
        </script>

        <footer class="footer">
        @yield('footer')
          <b>&copy; Copyright 2017 by <a href="https://github.com/BahaaAlhagar" target="_blank">Bahaa Alhagar</a>.</b>

        </footer>
    </body>
</html>
