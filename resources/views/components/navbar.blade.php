

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container" bis_skin_checked="1">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01" bis_skin_checked="1">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
            </ul>
            <form class="d-flex">

                <a href="{{ route('auth.redirect', ['provider' => 'github']) }}" class="btn btn-secondary my-2 my-sm-0" type="submit">Sign In</a>
            </form>
        </div>
    </div>
</nav>

