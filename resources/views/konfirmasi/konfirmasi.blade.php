<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/js/bangku.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/konfirmasi.css">
</head>

<body>
    @csrf
    @include('layouts.navbar')
    <div class="judul">
        <h3>{{ $jadwal->film->judul }}</h3>
    </div>
    <div class="film-item">
        <img src="{{ asset('storage/' . $jadwal->film->cover) }}" class="rounded float-start cover" alt="...">
    </div>
    <div class="durasi">
        <p>{{ $jadwal->film->durasi }} Menit</p>
    </div>
    <div class="font-bskp">
        @foreach ($groupedJadwal as $bioskop => $jadwalGroup)
            @php
                $jadwal = $jadwalGroup->first();
            @endphp
            <h3>{{ $jadwal->studio->bioskop->nama_bioskop }}</h3>
            <p class="fs-5">{{ $jadwal->tgl_tayang }}</p>
            <p class="harga fs-5">Rp{{ $jadwal->harga }}</p>
            @foreach ($jadwalGroup as $j)
                <form action="{{ route('bangku', $j->jadwal_id) }}" method="GET">
                    <input type="hidden" name="harga" value="{{ $j->harga }}">
                    <input type="hidden" name="tanggal" value="{{ $j->tgl_tayang }}">
                    <button class="btn btn-primary" type="submit" value="{{ $j->wkt_tayang }}" name="jamTayang">
                        {{ $j->wkt_tayang }}
                    </button>
                </form>
                <br>
            @endforeach
        @endforeach
    </div>
</body>
</html>
