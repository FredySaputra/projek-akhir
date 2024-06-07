<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/riwayat.css">
</head>

<body>
    <div class="all">
        <img src="{{asset('image/qr.png')}}" class="image img-preview img-fluid d-block">
        <hr>
        <div class="riwayat">
            <h4>Tanggal Tayang : {{$tiket->jadwal->tgl_tayang}} {{$tiket->jadwal->wkt_tayang}}</h4>
            <h4>Nomor Kursi    : {{$tiket->nomor_kursi}}</h4>
            <h4>Kode Tiket     : {{$tiket->tiket_id}}</h4>
            <h4>Nama Bioskop   : {{$tiket->jadwal->studio->bioskop->nama_bioskop}}</h4>
            <h4>Studio         : {{$tiket->jadwal->studio->nama_studio}}</h4>
            <h4>Total Harga    : {{$tiket->harga}}</h4>

            <br>
            <a href="/nontonbioskop" class="btn btn-info">Kembali Ke Tampilan Awal</a> <br> <br>
            <a href="{{route('riwayat',Auth::user()->user_id)}}" class="btn btn-success">Lihat Riwayat Lainnya</a>
        </div>
    </div>
</body>

</html>