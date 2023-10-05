<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">List Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Add Transaksi</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                            {{-- @php
                            $total = 0; // Inisialisasi total
                            @endphp --}}
                        
                            @foreach ($transaksi as $cl => $hasil)
                                <tr>
                                    <th>{{ $cl+1 }}</th>
                                    <td>{{ $hasil->Barang->nama_barang }}</td>
                                    <td>{{ $hasil->jumlah }}</td>
                                    <td>{{ $hasil->Barang->harga }}</td>
                                    <!-- Hitung dan tampilkan Sub Total -->
                                    <td>{{ $hasil->jumlah * $hasil->Barang->harga }}</td>
                                    <td>
                                        {{-- <form action="{{ route('payment.index') }}" method="GET"> --}}
                                            <button type="submit" class="btn btn-danger btn-sm">Bayar</button>
                                        </form>
                                    </td>
                                </tr>
                        
                                {{-- @php
                                    $total += $hasil->jumlah * $hasil->Barang->harga; // Tambahkan subtotal ke total
                                @endphp --}}
                            @endforeach
                    </tbody>
                    {{-- <div class="position-absolute bottom-0 end-0 translate-middle-x">
                        <strong>Total: {{ $total }}</strong>
                    </div> --}}
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>