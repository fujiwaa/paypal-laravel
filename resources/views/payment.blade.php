<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    @php
    $amount = $transaksi->jumlah * $transaksi->Barang->harga
    @endphp

    <div class="container mt-5">
        <h2 class="mb-4">Payment Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Id Transaksi : {{ $transaksi->id_transaksi }}</h5>
                <p class="card-text">
                    Pembeli : {{$transaksi->User->nama_user}} <br>
                    Nama barang : {{$transaksi->Barang->nama_barang}} <br>
                    Jumlah : {{ $transaksi->jumlah }} <br>
                    Harga : {{ $transaksi->Barang->harga }} <br>
                    Sub Total : {{ $amount }}
                </p>
                <form action="{{ route('make.payment') }}" method="GET">
                    @csrf
                    <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
                    <input type="hidden" name="nama_user" value="{{ $transaksi->User->nama_user }}">
                    <input type="hidden" name="nama_barang" value="{{ $transaksi->Barang->nama_barang }}">
                    <input type="hidden" name="jumlah" value="{{ $transaksi->jumlah }}">
                    <input type="hidden" name="harga" value="{{ $transaksi->Barang->harga }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <button type="submit" class="btn btn-danger btn-sm">Pay With Paypal</button>
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>