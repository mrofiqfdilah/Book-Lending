<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body style="background-color:#f4f5f8; font-family:poppins;">
    <nav class="navbar navbar-expand-lg " style="background: #fff; height:70px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); ">
        <div class="container-fluid">
          <img src="img/Frame.png" style="margin-left: 100px;" alt=""><a class="navbar-brand" href="#" style="position: relative; left:10px;">LibraryApp</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 200px;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('listbuku') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('cart') }}">Cart</a>
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


    <div class="container">
        <h4 class="mt-5">Nama Murid: {{ $userName }}</h4>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                    <th>Jumlah Dipinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjamanUser as $no => $pinjaman)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $pinjaman->buku->namabuku ?? 'Buku Tak Tersedia' }}</td>
                        <td>{{ $pinjaman->entitas }} Buku</td>
                        <td>{{ $pinjaman->tglpinjam }}</td>
                        <td>{{ $pinjaman->tglkembali }}</td>
                        <td>
                            <form action="{{ route('kembalikan', ['id' => $pinjaman->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Kembalikan Buku</button>
                            </form>                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>