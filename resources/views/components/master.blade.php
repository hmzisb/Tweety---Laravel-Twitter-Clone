<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f94ad90b02.js" crossorigin="anonymous"></script>
     <script type="text/javascript" src="http://unpkg.com/turbolinks"></script>
</head>
<body class="px-8 ">
    <div id="app" class="mt-10 mb-32">

{{--        <section class="px-8 py-4 mb-4 mt-2">
            <header class="container mx-auto">
                <a href="/tweets">
                <img 
                    src="/images/logo.png"
                    width="50" 
                >
                </a>
            </header>
           
       </section>  --}}

      
      {{$slot}}
     

    </div>
   
</body>
</html>
