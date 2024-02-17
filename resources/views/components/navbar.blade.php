<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container" bis_skin_checked="1">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/head-filled.svg') }}"width="40" alt="">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01" bis_skin_checked="1">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }} }}" href="{{ route('landing') }}">Inicio
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                @auth()
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('module.index') ? 'active' : '' }}" href="{{ route('module.index') }}">Mentorias</a>
                    </li>
                @endauth
            </ul>
            @auth()

                <div class="d-flex ">
                    <ul class="navbar-nav me-auto">
                        <li>
                            <img src="{{ 'https://github.com/' . auth()->user()->github_username . '.png' }}"
                                 alt="{{ auth()->user()->name }}" class="rounded-circle" width="40" height="40">
                        </li>
                        <li class="px-2">
                            <div class="nav-link">
                                <span>{{ auth()->user()->name }}</span>
                            </div>
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button class="nav-link" type="submit">Sign Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

            @guest()
                <div class="d-flex ">
                    <ul class="navbar-nav me-auto">
                        <div class="nav-link">
                            <form>
                                <a href="{{ route('auth.redirect', ['provider' => 'github']) }}"
                                   type="submit" class="btn btn-primary">Sign In</a>
                            </form>
                        </div>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>

