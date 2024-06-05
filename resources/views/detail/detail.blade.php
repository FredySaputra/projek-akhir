<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/detail.css">
</head>


<body>
    @include("layouts.navbar")
    <div class="judul">
        <h3>{{$jadwal->film->judul}}</h3>
    </div>
    <div class="film-item">
        <img src="{{asset('storage/' . $jadwal->film->cover)}}" class="rounded float-start cover" alt="...">
    </div>
    <div class="beli">
        @auth
            @if($tiket)
                <a class="btn btn-primary" href="{{ url('konfirmasi', $jadwal->jadwal_id) }}" role="button">Beli Tiket</a>
            @else
                <p>Tiket tidak tersedia</p>
            @endif          
            @else
                @if($tiket)
                    <a class="btn btn-primary" href="{{ route('login') }}" role="button">Beli Tiket</a>
                @else
                    <p>Tiket tidak tersedia</p>
                @endif          
                @endauth
    </div>
    <div class="deskripsi">
        <p>{{$jadwal->film->deskripsi}}</p>
    </div>

    <div>

    </div>
    @include("layouts.footer")
</body>

</html>