<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/navbar.css">
<nav class="navbar bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" class="font">
            Jendela21
        </a>
        @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="nav-link active" type="submit" aria-current="page"><i
                                    class="bi bi-box-arrow-left"></i>LogOut</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>