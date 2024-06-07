<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jendela21 - Pesan tiket bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/utama.css">
    <link rel="shortcut icon" href="/images/jendela.png" type="x-icon">
</head>

<body>
    @include("layouts.navbar")
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('oke'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('oke') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('login'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('login') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row">
            @forelse ($jadwal as $f)
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/' . $f->film->cover)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$f->film->judul}}</h5>
                        <p class="card-text"></p>
                        <a href="{{url('detail-film', $f->jadwal_id)}}" class="btn btn-primary">Beli Tiket</a>
                    </div>
                </div>
            @empty
                <div class="kosong">
                    <h3>Jadwal belum ditambahkan</h3>
                </div>
            @endforelse
        </div>
    </div>
    <!-- @include("layouts.footer"); -->
</body>

</html>