<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
                @auth
                    @if(Auth::user()->status_prav)
                        <a class="btn btn-outline-secondary" href="/threads/create">Новая тема  </a>
                    @endif
                @endauth
            <a>---</a>
                @auth
                    @if(Auth::user()->status_prav)
                        <a class="btn btn-outline-secondary" href="/all-users">Список пользователей</a>
                   @endif
                @endauth




{{--            --}}
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav navbar-right"  @style('position: fixed; top: 2; right: 0; z-index: 9999;')
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Войти</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
{{--                                <a class="dropdown-item" href="{{ route('profiles', ['id' => Auth::user()->id]) }}">Мой профиль</a>--}}
                                <a class="dropdown-item" href="{{ url('/profiles/' . Auth::user()->id) }}">Мой профиль</a>
{{--                               <a class="dropdown-item" href="{{ route('profiles.show', ['id' => Auth::user()->id]) }}">Мой профиль</a>--}}
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Редактировать профиль</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

