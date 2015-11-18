<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

<header class="row">
    @include('includes.header')
</header>

<div id="main" class="row">

    <!-- sidebar content -->
    <div id="sidebar" class="col s12 m3 l2">
        @include('includes.sidebar')
    </div>

    <!-- main content -->
    <div id="content" class="col s12 m9 l10">
        @yield('content')
    </div>

    </div>

{{--<footer class="row">
    @include('includes.footer')
</footer>--}}

</body>
</html>