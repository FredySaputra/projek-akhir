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
            <h3>Edit Film</h3>
        </div>
        <form action="{{url('update-film', $film->film_id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="film_id" class="form-label">ID Film</label>
                <input type="text" name="film_id" class="form-control" id="film_id" value="{{$film->film_id}}" disabled>
            </div>
            <div class=" mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Agak Laen"
                    value="{{$film->judul}}" required>
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Genre</label>
                <select class="form-select" name="genre" aria-label="Default select example">
                    <option selected name="genre" required>Pilih Genre</option>
                    <option value="Horror" name="genre">Horror</option>
                    <option value="Comedy" name="genre">Comedy</option>
                    <option value="Romance" name="genre">Romance</option>
                </select>
                @error('genre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Durasi </label>
                <div class="input-group mb-3">
                    <input type="text" name="durasi" id="formGroupExampleInput" class="form-control" placeholder="100"
                        value="{{$film->durasi}}" required>
                    <span class="input-group-text" id="basic-addon2">Menit</span>
                    @error('durasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tanggal Rilis</label>
                <input type="date" name="tgl_rilis" class="form-control" value="{{$film->tgl_rilis}}" required>
                @error('tgl_rilis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Deskripsi Film</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="film ini menceritakan .. "
                    value="{{$film->deskripsi}}" required>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Upload Cover</label>
                <input type="hidden" name="oldcover" value="{{$film->cover}}">
                <img src="{{asset('storage/' . $film->cover)}}" class="img-preview img-fluid d-block">
                <input class="form-control" type="file" id="cover" name="cover" onchange="previewImage()" required>
                @error('cover')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Submit</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin ingin mengubah data?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Pastikan data yang anda masukkan sudah benar</p>
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
<script>

    function previewImage() {
        const image = document.querySelector('#cover')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }



</script>