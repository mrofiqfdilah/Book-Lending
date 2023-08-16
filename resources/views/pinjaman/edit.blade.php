<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit data peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    
   <div class="container mt-5">

    <a href="{{ route('pinjaman.index') }}" class="btn btn-primary mb-3">Data Pinjaman</a>
    <div class="card">
        <div class="card-body">
        <form action="{{ route('pinjaman.update', $pinjaman->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-2">
                <label for="namapeminjam" class="form-label">Nama Peminjam</label>
                <input type="text" value="{{ $pinjaman->namapeminjam }}" placeholder="Masukan Nama Peminjam" name="namapeminjam" class="form-control" id="namapeminjam">
            </div>

            <div class="mb-2">
                <label for="entitas" class="form-label">Jumlah Dipinjam</label>
                <input type="number" value="{{ $pinjaman->entitas }}" placeholder="Masukan Jumlah Buku Dipinjam" name="entitas" class="form-control" id="entitas">
            </div>

            <div class="mb-2">
                <label for="tglpinjam" class="form-label">Tanggal Pinjam Buku</label>
                <input type="date" value="{{ $pinjaman->tglpinjam}}" name="tglpinjam" class="form-control" id="tglpinjam">
            </div>
            <div class="mb-2">
                <label for="tglkembali" class="form-label">Tanggal Mengembalikan Buku</label>
                <input type="date" value="{{ $pinjaman->tglkembali }}" name="tglkembali" class="form-control" id="tglkembali">
            </div>
            <div class="mb-4">
                <label for="kelas" class="form-label">Masukan Kelas Pemesan</label>
                <select name="kelas" value="{{ $pinjaman->kelas }}" class="form-control">
                    <option value="10">Kelas 10</option>
                    <option value="11">Kelas 11</option>
                    <option value="12">Kelas 12</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-5" style="float: right;">UPdate Data</button>
        </form>
        </div>
    </div>
   </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>