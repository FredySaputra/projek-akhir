<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Nomor Kursi</title>

    <style>
        .seats {
            cursor: pointer;
        }

        .clicked {
            background-color: yellow;
        }

        .disabled {
            background-color: grey;
            cursor: not-allowed;
        }

        .tampil-bangku {
            margin-left: 500px;

        }

        .bangku {
            margin-left: 200px;
            align-items: center;
        }

        .tombol {
            margin-top: 20px;
            margin-left: 300px;
        }
    </style>
</head>

<body>

    <h4>{{$jadwal->film->judul}}</h4>
    <p>Bioskop: {{$jadwal->studio->bioskop->nama_bioskop}}</p>
    <p>Studio : {{$jadwal->studio->nama_studio}}</p>
    <div class="tampil-bangku">
        <div class="bangku">
            <h4>-------------------------------- Screen --------------------------------</h4>
            <form action="{{ route('save-seats', $jadwal->jadwal_id) }}" method="POST">
                @csrf
                <input type="text" name="harga" value="{{ session('harga') }}" hidden>
                <input type="text" name="tanggal" value="{{ session('tanggal') }}" hidden>
                <input type="text" name="jam" value="{{ session('jam') }}" hidden>
                <input type="hidden" name="nomor_kursi" value="">
                <table>
                    <tr>
                        <th width="25" class="seats" data-value="A1" valign="middle" align="center"><a href="#">A1</a>
                        </th>
                        <th width="25" class="seats" data-value="A2" valign="middle" align="center"><a href="#">A2</a>
                        </th>
                        <th width="25" class="seats" data-value="A3" valign="middle" align="center"><a href="#">A3</a>
                        </th>
                        <th width="25" class="seats" data-value="A4" valign="middle" align="center"><a href="#">A4</a>
                        </th>
                        <th width="25" class="seats" data-value="A5" valign="middle" align="center"><a href="#">A5</a>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th width="25" class="seats" data-value="A6" valign="middle" align="center"><a href="#">A6</a>
                        </th>
                        <th width="25" class="seats" data-value="A7" valign="middle" align="center"><a href="#">A7</a>
                        </th>
                        <th width="25" class="seats" data-value="A8" valign="middle" align="center"><a href="#">A8</a>
                        </th>
                        <th width="25" class="seats" data-value="A9" valign="middle" align="center"><a href="#">A9</a>
                        </th>
                        <th width="25" class="seats" data-value="A10" valign="middle" align="center"><a href="#">A10</a>
                        </th>
                    </tr>
                    <tr>
                        <th width="25" class="seats" data-value="B1" valign="middle" align="center"><a href="#">B1</a>
                        </th>
                        <th width="25" class="seats" data-value="B2" valign="middle" align="center"><a href="#">B2</a>
                        </th>
                        <th width="25" class="seats" data-value="B3" valign="middle" align="center"><a href="#">B3</a>
                        </th>
                        <th width="25" class="seats" data-value="B4" valign="middle" align="center"><a href="#">B4</a>
                        </th>
                        <th width="25" class="seats" data-value="B5" valign="middle" align="center"><a href="#">B5</a>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th width="25" class="seats" data-value="B6" valign="middle" align="center"><a href="#">B6</a>
                        </th>
                        <th width="25" class="seats" data-value="B7" valign="middle" align="center"><a href="#">B7</a>
                        </th>
                        <th width="25" class="seats" data-value="B8" valign="middle" align="center"><a href="#">B8</a>
                        </th>
                        <th width="25" class="seats" data-value="B9" valign="middle" align="center"><a href="#">B9</a>
                        </th>
                        <th width="25" class="seats" data-value="B10" valign="middle" align="center"><a href="#">B10</a>
                        </th>
                    </tr>
        </div>
        </table>
        </form>

    </div>
    <div class="tombol">
        <button id="sendData" data-jadwal-id="{{ $jadwal->jadwal_id }}" class="btn-success">Pesan Bangku!</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let selectedSeats = [];
        let disabledSeats = @json($selectedSeats);

        console.log('Disabled Seats: ', disabledSeats); 

        if (!Array.isArray(disabledSeats)) {
            disabledSeats = [];
        }

        function changeColor(event) {
            let th = event.currentTarget;
            let value = th.getAttribute('data-value');
            console.log("Clicked seat: ", value); 

            if (disabledSeats.includes(value)) {
                return; 
            }

            if (selectedSeats.includes(value)) {
                selectedSeats = selectedSeats.filter(seat => seat !== value);
                th.classList.remove('clicked');
            } else {
                selectedSeats.push(value);
                th.classList.add('clicked');
            }
            console.log("Selected seats: ", selectedSeats); 
        }

        document.querySelectorAll('.seats').forEach(function (element) {
            let value = element.getAttribute('data-value');
            if (disabledSeats.includes(value)) {
                console.log('Disabling seat: ', value); 
                element.classList.add('disabled');
                element.style.pointerEvents = 'none';
            } else {
                element.addEventListener('click', changeColor);
            }
        });

        document.getElementById('sendData').addEventListener('click', function () {
            document.querySelector('input[name="nomor_kursi"]').value = selectedSeats.join(',');
            document.querySelector('form').submit();
        });
    </script>
</body>

</html>