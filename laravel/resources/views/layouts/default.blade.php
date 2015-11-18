<html>
<head>
    @include('includes.head')

    @yield('css')
</head>
<body>

@include('includes.header')

<div class="container">
    @yield('content')
</div>

@yield('js')

</body>
</html>