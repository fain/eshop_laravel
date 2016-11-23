<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        @section('right_sidebar')
            This is the master right sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>