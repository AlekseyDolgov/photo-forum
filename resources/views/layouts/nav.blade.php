<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Темы форума</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Новая тема</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="/">Все темы</a></li>
                        <li><a class="dropdown-item" href="">Мои темы</a></li>
                        <li><a class="dropdown-item" href="">Популярные темы</a></li>
                        <li><a class="dropdown-item" href="">Темы с сообщениями</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Рубрики</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Новая рубрика</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="/">Рубрика</a></li>
                        <li><a class="dropdown-item" href="">Рубрика</a></li>
                        <li><a class="dropdown-item" href="">Рубрика</a></li>
                        <li><a class="dropdown-item" href="">Рубрика</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
