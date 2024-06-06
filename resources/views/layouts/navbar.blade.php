<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/navbar.css">
<nav class="navbar navbar-expand-lg bg-success border-bottom border-body data-bs-theme=" dark"">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Jendela 21</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/nontonbioskop')}}">Sedang Tayang</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('riwayat',Auth::user()->user_id)}}">Riwayat Pembayaran</a>
                    </li>
                @endauth
            </ul>
            @auth
                <li class="navbar-nav  ms-auto ">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link active" type="submit" aria-current="page"><i
                                class="bi bi-box-arrow-left"></i>Logout</button>
                    </form>
                </li>
            @endauth
            </ul>

        </div>
    </div>
</nav>