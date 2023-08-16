<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    
   <div class="container mt-5">

    <a href="{{ route('buku.index') }}" class="btn btn-primary mb-3">Data Buku</a>
    <div class="card">
        <div class="card-body">
        <form action="{{ route('buku.update', $buku->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-2">
                <label for="namabuku" class="form-label">Nama Buku</label>
                <input type="text" value="{{ $buku->namabuku }}" placeholder="Masukan Nama Buku" name="namabuku" class="form-control" id="namabuku">
            </div>

            <div class="mb-2">
                <label for="penerbit" class="form-label">Penerbit Buku</label>
                <input type="text" value="{{ $buku->penerbit }}" placeholder="Masukan Nama Penerbit" name="penerbit" class="form-control" id="penerbit">
            </div>

            <div class="mb-2">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" value="{{ $buku->stock}}" placeholder="Masukan Jumlah Stock Buku" name="stock" class="form-control" id="stock">
            </div>
            <div class="mb-4">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" accept="image/"  onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" name="gambar" class="form-control" id="gambar">
            </div>
            <div class="mt-3">
                <img src=" {{ asset($buku->gambar) }}" id="output" width="100">
               </div>
            <button type="submit" class="btn btn-primary" style="float: right">Update</button>
        </form>
        </div>
    </div>
   </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>