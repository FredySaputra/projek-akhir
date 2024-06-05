<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jendela21 - Admin Tambah Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/tambah-studio.css">
</head>

<body>
    <form action="/admin/tambah-studio/{bioskop_id}" method="post">
        @csrf
        @include("layouts.nav-admin")
        <div class="layout">
            <div class="jdl_tambah">
                <h3>Tambah Studio</h3>
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Bioskop</label>
                <select class="form-select" name="bioskop_id" aria-label="Default select example">
                    <option selected name="bioskop_id" required>Pilih Bioskop</option>
                    @for ($i = 1; $i <= $bioskop->jml_studio; $i++)
                        <option name="bioskop_id">{{$bioskops->bioskop_id}}
                            - {{$bioskop->nama_bioskop}}</option>
                    @endfor
                </select>
            </div>

        </div>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Submit</button>
        <div class=" modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="submit" class="btn btn-primary" onchange=redirectToBioskop()>Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <!-- <script>
        function redirectToBioskop() {
            var bioskopId = document.getElementById('bioskop_id').value;
            if (bioskopId) {
                window.location.href = `/admin/tambah-studio/${bioskopId}`;
            } else {
                alert('Please select a bioskop.');
            }
        }
    </script> -->
</body>

</html>