<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
        <title>IPB-Financeiro</title>
    
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    
        <!-- Toastr style -->
        <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    
        <!-- Gritter -->
        <link href="{{ asset('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
    
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ipbStyle.css') }}" rel="stylesheet">
    
    
        @stack('css')
    
    
    </head>
<body>
    <div id="app">

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
