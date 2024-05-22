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
    @csrf
    @include("layouts.nav-admin")
    <div class="layout">
        <div class="jdl_tambah">
            <h3>Tambah Film</h3>
        </div>
        <form action="/tambah-film" method="post">
            @csrf
            <div class="mb-3">
                <label for="film_id" class="form-label">ID Film</label>
                <input type="text" name="film_id" class="form-control" id="film_id" placeholder="12ALAN">
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Agak Laen">
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Genre</label>
                <select class="form-select" name="genre" aria-label="Default select example">
                    <option selected name="genre">Pilih Genre</option>
                    <option value="Horror" name="genre">Horror</option>
                    <option value="Comedy" name="genre">Comedy</option>
                    <option value="Romance" name="genre">Romance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Durasi </label>
                <div class="input-group mb-3">
                    <input type="text" name="durasi" id="formGroupExampleInput" class="form-control" placeholder="100">
                    <span class="input-group-text" id="basic-addon2">Menit</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tanggal Rilis</label>
                <input type="date" name="tgl_rilis" class="form-control" placeholder="">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Deskripsi Film</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="film ini menceritakan .. ">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</body>

</html>