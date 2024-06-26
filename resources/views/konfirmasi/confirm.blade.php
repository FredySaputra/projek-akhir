<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        .confirm{
            margin-left: 650px;
            margin-top: 100px;
        }

    </style>
</head>

<body>
    <div class="confirm">
        <form action="{{route('confirm')}}" method="post">
            @csrf
            @auth
                <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
            @endauth
            @if (isset($waktu) && isset($tanggal) && isset($kursi))
                <h5>Detail Pesanan: </h5>
                <p>Studio: {{ $jadwal->studio->nama_studio}}</p>
                <input type="hidden" name="jadwal_id" value="{{$jadwal->jadwal_id}}">
                <input type="hidden" name="jumlah" value="{{$total}}">
                <p>Tanggal: {{ $tanggal }}</p>
                <input type="hidden" name="tgl_pesan" value="{{$tanggal}}">
                <input type="hidden" name="tgl_payment" value="{{$tanggal}}">
                <p>Waktu: {{ $waktu }}</p>
                <input type="hidden" name="waktu" value="{{$waktu}}">
                <p>Kursi: {{ $kursi }}</p>
                <input type="hidden" name="nomor_kursi" value="{{$kursi}}">
                <p>Total Harga: Rp{{ count(explode(',', $kursi)) * $harga }}</p>
                <input type="hidden" name="harga" value="{{ count(explode(',', $kursi)) * $harga }}">
                <p>Saldo E-Wallet : Rp{{$wallet->amount}}</p>
                <input type="hidden" name="amount" value="{{ $wallet->amount - (count(explode(',', $kursi)) * $harga)}}">
                @if($wallet->amount >= count(explode(',', $kursi)) * $harga)
                    <button type="submit" class="btn btn-success">Konfirmasi Pembelian</button>
                @else
                    <button type="button" class="btn btn-success" disabled>Konfirmasi Pembelian</button>
                @endif
            @else
                <p>No session values found.</p>
            @endif
        </form>
    </div>

</html>