<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Softradix">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="{{ url('css/main.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ url('js/jquery-3.5.1.min.js') }}"></script>
    
    @yield('styles')
  </head>
  <body>
    <section class="main_section">
        <div>
            @yield('content')
        </div>
    </section>
    
    
    @yield('scripts')
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
