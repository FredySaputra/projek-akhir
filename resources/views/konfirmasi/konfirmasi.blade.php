<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/js/bangku.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/konfirmasi.css">
    <!-- <style>
        /* .seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: #444;
            color: white;
            display: inline-block;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }

        .selected {
            background-color: #6c757d !important;
        }

        .occupied {
            background-color: #ff0000 !important;
            cursor: not-allowed;
        }

        .screen {
            width: 100%;
            height: 50px;
            background-color: #ccc;
            text-align: center;
            line-height: 50px;
            margin-bottom: 20px;
        }

        .seats-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 300px;
            margin: 0 auto;
        }

        .seat-row {
            display: flex;
            justify-content: center;
            width: 100%;
        } */
    </style> -->
</head>

<body>

    @csrf
    @include('layouts.navbar')
    <div class="judul">
        <h3>{{ $jadwals->film->judul }}</h3>
    </div>
    <div class="film-item">
        <img src="{{ asset('storage/' . $jadwals->film->cover) }}" class="rounded float-start cover" alt="...">
    </div>
    <div class="durasi">
        <p>{{ $jadwals->film->durasi }} Menit</p>
    </div>
    <div class="font-bskp">
        @foreach ($groupedJadwal as $key => $jadwalGroup)
                @php
                    $jadwal = $jadwalGroup->first();
                @endphp
                <h3>{{ $jadwal->studio->bioskop->nama_bioskop }}</h3>
                <p class="fs-5">{{ $jadwal->tgl_tayang }}</p>
                <p class="harga fs-5">Rp{{ $jadwal->harga }}</p>
                @foreach ($jadwalGroup as $j)
                    <form action="{{route('bangku', $jadwals->jadwal_id)}}">
                        <input type="text" name="harga" value="{{$j->harga}}" hidden>
                        <input type="date" name="tanggal" value="{{$j->tgl_tayang}}" hidden>
                        <button class="btn btn-primary" type="submit" value="{{$j->wkt_tayang}}"
                            name="jamTayang">{{ $j->wkt_tayang }}</button>
                    </form>
                @endforeach
        @endforeach
    </div>


</body>

<!-- Seats Container -->
<!-- <div class="screen">Screen</div>
    <div class="seats-container" id="seatsContainer">
        <!-- Seats will be generated here -->
<!-- </div> -->

<!-- <form id="seatsForm" method="POST" action="{{ route('seats.store') }}">
        @csrf
        <input type="hidden" name="jadwal_id" id="jadwalId">
        <input type="hidden" name="selected_seats" id="selectedSeats">
        <button type="submit" id="confirmSeats" class="btn btn-success">Confirm Seats</button>
    </form> -->

<!-- <script>
        function generateSeats(jadwalId, maxSeats) {
            const seatsContainer = document.getElementById('seatsContainer');
            seatsContainer.innerHTML = ''; // Clear previous seats
            document.getElementById('jadwalId').value = jadwalId;

            // Fetch occupied seats from server (in real implementation)
            const occupiedSeats = []; // Gantikan dengan data seat yang terpesan dari database

            // Dummy occupied seats for example
            fetch(`/api/getOccupiedSeats?jadwal_id=${jadwalId}`)
                .then(response => response.json())
                .then(data => {
                    const occupiedSeats = data;

                    for (let row = 0; row < 2; row++) {
                        const seatRow = document.createElement('div');
                        seatRow.classList.add('seat-row');

                        for (let col = 1; col <= 5; col++) {
                            const seatNumber = (row * 5 + col).toString().padStart(2, '0');
                            const seatElement = document.createElement('div');
                            seatElement.classList.add('seat');
                            seatElement.textContent = seatNumber;

                            if (occupiedSeats.includes(seatNumber)) {
                                seatElement.classList.add('occupied');
                            } else {
                                seatElement.addEventListener('click', function () {
                                    handleSeatClick(seatElement, maxSeats);
                                });
                            }

                            seatRow.appendChild(seatElement);
                        }

                        seatsContainer.appendChild(seatRow);
                    }
                });

            }
        }

            function handleSeatClick(seatElement, maxSeats) {
                const selectedSeats = document.querySelectorAll('.seat.selected');
                if (seatElement.classList.contains('selected')) {
                    seatElement.classList.remove('selected');
                } else {
                    if (selectedSeats.length < maxSeats) {
                        seatElement.classList.add('selected');
                    } else {
                        alert(`You can only select up to ${maxSeats} seats.`);
                    }
                }
                updateSelectedSeatsInput();
            }

            function updateSelectedSeatsInput() {
                const selectedSeats = document.querySelectorAll('.seat.selected');
                const seatNumbers = Array.from(selectedSeats).map(seat => seat.textContent);
                document.getElementById('selectedSeats').value = seatNumbers.join(',');
            }
    </script> -->

</html>