<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <p class="navbar-text navbar-right"><a href="#" class="navbar-link"><img src="http://localhost:8000/materialize-css/images/logo.png"></a></p>
        </div>
        <div class="nav navbar-nav navbar-right">
            @if($currentUser)
                <p> Usuario: {{ $currentUser->name }} <a href="{{ route('auth_destroy_path') }}">Salir</a> </p>
            @else
                <p><a href="{{ route('auth_show_path') }}">Login</a></p>
            @endif
        </div>
    </div>
</nav>