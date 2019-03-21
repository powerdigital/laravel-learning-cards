<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <ul class="logo-block">
            <li>
                <a href="/" class="home"></a>
            </li>
            <li>
                <a href="/" class="navbar-brand">Ana tili</a>
            </li>
        </ul>
        @if (Auth::guest())
            <a href="/admin">Вход</a>
        @else
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu bg-dark" role="menu">
                    <li>
                        <a href="/admin">Админка</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Выход
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
