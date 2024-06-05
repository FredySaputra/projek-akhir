<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursi Bioskop</title>
    <link rel="stylesheet" href="/css/konfirmasi.css">
    <style>
        /* CSS styles for seats */
        .seat {
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
    </style>
</head>

<body>
    <div class="screen">Screen</div>
    <div class="seats-container" id="seatsContainer">
        <!-- Seats will be generated here -->
    </div>

    <script>
        // JavaScript for generating seats and handling clicks
        function generateSeats(maxSeats) {
            const seatsContainer = document.getElementById('seatsContainer');
            seatsContainer.innerHTML = ''; // Clear previous seats

            for (let row = 0; row < 2; row++) {
                const seatRow = document.createElement('div');
                seatRow.classList.add('seat-row');

                for (let col = 1; col <= 5; col++) {
                    const seatNumber = (row * 5 + col).toString().padStart(2, '0');
                    const seatElement = document.createElement('div');
                    seatElement.classList.add('seat');
                    seatElement.textContent = seatNumber;
                    seatElement.addEventListener('click', function () {
                        handleSeatClick(seatElement, maxSeats);
                    });
                    seatRow.appendChild(seatElement);
                }

                seatsContainer.appendChild(seatRow);
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
        }

        // Call generateSeats function with maxSeats value passed from previous page
        generateSeats({{ $maxSeats }});
    </script>
</body>

</html>
