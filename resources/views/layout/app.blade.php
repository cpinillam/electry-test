<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Electry Consulting - Cats Facts - Carlos Pinilla</title>
    <link rel="icon" href="https://www.electryconsulting.com/favicon.ico?v=2" type="image/icon type">
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset('js/query.jscroll.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e23cd948e.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">



</head>
<body>
<div id="app">

    <main class="py-4">
        @yield('content')
    </main>
</div>


<!-- Autoload Facts cats -->
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" style="transform: translate(100px, -300px); width: 800px; height: 500px;" src="svg/loader.svg" alt="Loading..." />',
            padding: 20,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>


</body>
</html>
