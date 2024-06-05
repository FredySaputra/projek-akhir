<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="p-3 mb-2 bg-light latar">
        <div class=" card text-center ">
            <div class=" card-header">

            </div>
            <form action="{{route('store')}}" method="post">
                @csrf
                <div class="card-body">
                    <h5 class="card-title">Jendela 21</h5>
                    <input class="form-control" type="text" placeholder="nama" name="nama"
                        aria-label="default input example" required>
                    <input class="form-control" type="text" placeholder="email" name="email"
                        aria-label="default input example" required>
                    <input class="form-control" type="password" placeholder="password" name="password"
                        aria-label="default input example" required>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>