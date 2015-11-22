<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>



<div class="container-fluid">

    <header class="row">
        @include('includes.header')
    </header>

    <div class="row">
    <!-- sidebar content -->
    <div id="sidebar" class="col-md-3">
        @include('includes.sidebar')
    </div>

    <!-- main content -->
    <div id="content" class="col-md-9">
        @yield('content')
    </div>

    </div>

</div>

{{--<footer class="row">
    @include('includes.footer')
</footer>--}}

</body>
</html>