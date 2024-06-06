<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    @include('layouts.navbar')
    @forelse ($tiket as $t)
        <h1>Riwayat Pembelian Tiket Bioskop</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Tiket ID</th>
                    <th scope="col">Nama Bioskop</th>
                    <th scope="col">Nama Studio</th>
                    <th scope="col">Nomor Kursi</th>
                    <th scope="col">Waktu Tayang</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$t->tiket_id}}</td>
                    <td>{{$t->jadwal->studio->bioskop->nama_bioskop}}</td>
                    <td>{{$t->jadwal->studio->nama_studio}}</td>
                    <td>{{$t->nomor_kursi}}</td>
                    <td>{{$t->waktu}}</td>
                    <td>{{$t->harga}}</td>
                    <td>{{$t->tgl_pesan}}</td>
                    <td>aksi</td>
                </tr>
    @empty
        <h5>Anda belum melakukan transaksi apapun</h5>
    @endforelse
        </tbody>
    </table>
</body>

</html>