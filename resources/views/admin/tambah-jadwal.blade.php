<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jendela21 - Admin Tambah Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/tambah-jadwal.css">
</head>

<body>

    @include("layouts.nav-admin")
    <div class="layout">
        <form action="{{ url('tambah')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="jdl_tambah">
                <h3>Tambah Jadwal</h3>
            </div>
            <div class="mb-3">
                <label for="bioskop" class="form-label">Bioskop</label>
                <select class="form-select" name="bioskop_id" aria-label="Default select example">
                    <option selected name="bioskop_id" required>Pilih Bioskop</option>
                    @foreach ($bioskop as $b)
                        <option value="{{$b->bioskop_id}}" name="bioskop_id">{{$b->bioskop_id}}
                            - {{$b->nama_bioskop}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="bioskop" class="form-label">Film</label>
                <select class="form-select" name="film_id" aria-label="Default select example">
                    <option selected name="film_id" required>Pilih film</option>
                    @foreach ($film as $f)
                        <option value="{{$f->film_id}}" name="film_id">{{$f->film_id}}
                            - {{$f->judul}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Studio</label>
                <select class="form-select" name="nama_studio" aria-label="Default select example">
                    @foreach ($bioskop as $biosko)
                        @for ($i = 1; $i <= $biosko->jml_studio; $i++)
                            <option value="{{ $biosko->bioskop_id }}-{{ $i }}">Studio {{ $i }} ({{ $biosko->nama_bioskop }})
                            </option>
                        @endfor
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Submit</button>
            <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin ingin menambahkan?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Pastikan data yang dimasukan sudah benar</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>