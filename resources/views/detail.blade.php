<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
<body style="font-family: poppins; background:#f4f5f8;">
  <nav class="navbar navbar-expand-lg " style="background: #fff; height:70px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); ">
    <div class="container-fluid">
      <img src="/img/Frame.png" style="margin-left: 100px;" alt=""><a class="navbar-brand" href="#" style="position: relative; left:10px;">LibraryApp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 200px;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" style="position: relative; left:-78px;" role="search">
          <input class="form-control me-2" type="search" placeholder="User Name : {{ Auth()->user()->name }}" aria-label="Search">
        </form>
        <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger" style="position: relative; left:-70px;">Logout</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container mt-4" >
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card" style="margin-top: 30px;">
          <div class="card-header">
            <h5 class="card-title">{{ $buku->namabuku }}</h5>
          </div>
          <div class="card-body">
            <p class="card-text">Penerbit Buku : {{ $buku->penerbit }}</p>
            <p class="card-text">Stock Buku Tersisa : {{ $buku->stock }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Form Pinjam Buku</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('pinjaman.store') }}" method="post" >
              <input type="hidden" name="id_buku" value="{{ $buku->id }}">
              @if(session('success'))
              <div class="alert alert-success" role="alert">
                  {{ session('success') }}
              </div>
          @endif
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="namapeminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" name="namapeminjam"  value="{{ Auth::user()->name }}" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select name="kelas" class="form-control">
                      <option value="10">Kelas 10</option>
                      <option value="11">Kelas 11</option>
                      <option value="12">Kelas 12</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="tglpinjam" class="form-label">Hari Pinjam</label>
                    <input type="date" name="tglpinjam" class="form-control" placeholder="Masukan Nama Anda">
                  </div>
                </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="tglkembali" class="form-label">Hari  Mengembalikan </label>
                      <input type="date" name="tglkembali" class="form-control" placeholder="Masukan Nama Anda">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="entitas" class="form-label">Jumlah Buku Dipinjam</label>
                    <input type="number" name="entitas" style="width: 510px;" class="form-control" placeholder="Masukan Jumlah Buku ">
                  </div>
                </div>
                
              </div>
              <div class="mb-3">
                <button type="submit" style="margin-left:20px; margin-top:-10px;" class="btn btn-primary">Pinjam Buku</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
