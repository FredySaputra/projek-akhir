<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Color on Click</title>
    <style>
        .seats {
            cursor: pointer;
        }

        .clicked {
            background-color: yellow;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <form action="{{ route('save-seats', $jadwal->jadwal_id) }}" method="POST">
        @csrf
        <input type="text" name="harga" value="{{session('harga')}}" hidden>
        <input type="text" name="tanggal" value="{{session('tanggal')}}" hidden>
        <input type="text" name="jam" value="{{session('jam')}}" hidden>
        <input type="hidden" name="nomor_kursi" value="">
        <table>
            <tr>
                <th width="25" class="seats" data-value="A1" valign="middle" align="center"><a href="#">A1</a></th>
                <th width="25" class="seats" data-value="A2" valign="middle" align="center"><a href="#">A2</a></th>
                <th width="25" class="seats" data-value="A3" valign="middle" align="center"><a href="#">A3</a></th>
                <th width="25" class="seats" data-value="A4" valign="middle" align="center"><a href="#">A4</a></th>
                <th width="25" class="seats" data-value="A5" valign="middle" align="center"><a href="#">A5</a></th>
            </tr>
            <tr>
                <th width="25" class="seats" data-value="B1" valign="middle" align="center"><a href="#">B1</a></th>
                <th width="25" class="seats" data-value="B2" valign="middle" align="center"><a href="#">B2</a></th>
                <th width="25" class="seats" data-value="B3" valign="middle" align="center"><a href="#">B3</a></th>
                <th width="25" class="seats" data-value="B4" valign="middle" align="center"><a href="#">B4</a></th>
                <th width="25" class="seats" data-value="B5" valign="middle" align="center"><a href="#">B5</a></th>
            </tr>
        </table>
    </form>
    <button id="sendData" data-jadwal-id="{{ $jadwal->jadwal_id }}">Kirim Data</button>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let selectedSeats = [];

        function changeColor(event) {
            let th = event.currentTarget;
            let value = th.getAttribute('data-value');
            console.log("Clicked seat: ", value);  // Debugging log

            if (selectedSeats.includes(value)) {
                selectedSeats = selectedSeats.filter(seat => seat !== value);
                th.classList.remove('clicked');
            } else {
                selectedSeats.push(value);
                th.classList.add('clicked');
            }
            console.log("Selected seats: ", selectedSeats);  // Debugging log
        }

        document.querySelectorAll('.seats').forEach(function (element) {
            element.addEventListener('click', changeColor);
        });

        document.getElementById('sendData').addEventListener('click', function () {
            document.querySelector('input[name="nomor_kursi"]').value = selectedSeats.join(',');
            document.querySelector('form').submit();
        });
    </script>
</body>

</html>