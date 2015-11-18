<ul>
    @if($currentUser)
        Usuario: {{ $currentUser->name }} <li><a href="{{ route('auth_destroy_path') }}">Salir</a></li>
    @else
        <li><a href="{{ route('auth_show_path') }}">Login</a></li>
    @endif
</ul>

