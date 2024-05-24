<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jendela21 - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    @include("layouts.nav-admin")
    <div class="terdaftar">
        <h4>Bioskop Terdaftar</h4>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Bioskop</th>
                    <th scope="col">Nama Bioskop</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Jumlah Studio</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bioskop as $a)
                    <tr>

                        <td>{{$a->bioskop_id}}</td>
                        <td>{{$a->nama_bioskop}}</td>
                        <td>{{$a->lokasi}}</td>
                        <td>{{$a->jml_studio}}</td>
                        <td>
                            <a href="{{url('edit-bioskop', $a->bioskop_id)}}">Edit</a> | <a
                                href="{{url('delete-bioskop', $a->bioskop_id)}}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="tayang">
        <h4>Film Sedang Tayang</h4>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID Film</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Tanggal Rilis</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($film as $b)
                    <tr>
                        <td>{{$b->film_id}}</td>
                        <td>{{$b->judul}}</td>
                        <td>{{$b->genre}}</td>
                        <td>{{$b->durasi}} Menit</td>
                        <td>{{$b->tgl_rilis}}</td>
                        <td>{{$b->deskripsi}}</td>
                        <td>{{$b->cover}}</td>
                        <td>
                            <a href="{{url('edit-film', $b->film_id)}}">Edit</a> | <a
                                href="{{url('delete-film', $b->film_id)}}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>