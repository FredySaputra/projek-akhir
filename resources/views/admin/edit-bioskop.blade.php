<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jendela21 - Admin Tambah Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/tambah-bioskop.css">
</head>

<body>

    @include("layouts.nav-admin")
    <div class="layout">
        <form action="{{url('update-bioskop', $bskp->bioskop_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="jdl_tambah">
                <h3>Edit Bioskop</h3>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">ID Bioskop</label>
                <input type="text" class="form-control" name="bioskop_id" value="{{$bskp->bioskop_id}}"
                    id="formGroupExampleInput2" placeholder="AR23" disabled required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Bioskop</label>
                <input type="text" name="nama_bioskop" class="form-control" id="formGroupExampleInput"
                    placeholder="Jendela Bioskop" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" id="formGroupExampleInput2"
                    placeholder="Jakarta Selatan" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Jumlah Studio</label>
                <input type="text" name="jml_studio" class="form-control" id="formGroupExampleInput" placeholder="10"
                    required>
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