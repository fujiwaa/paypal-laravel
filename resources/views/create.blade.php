<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Add Transaksi</h1>
        <a href="{{ route('transaksi.index') }}" class="btn btn-primary mb-3">List Transaksi</a>
        <div class="card">
            <div class="card-body">
              <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                  <label for="id_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_barang" id="id_barang">
                        @foreach ($barang as $b)
                            <option value="{{ $b->id_barang}}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                  </div>
                </div>
                
                <div class="mb-3 row">
                  <label for="id_user" class="col-sm-2 col-form-label">Pembeli</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_user" id="id_user">
                      <option value="{{ $user->id_user }}">{{ $user->nama_user }}</option>
                    </select>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary float-end">Simpan</button>
              </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>