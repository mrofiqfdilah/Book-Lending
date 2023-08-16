<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
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
                <a class="nav-link" href="">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Siswa
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Another API</a>
              </li>
            </ul>
            <form class="d-flex" style="position: relative; left:-78px;" role="search">
              <input class="form-control me-2" type="search" placeholder="User Name : {{ Auth()->user()->name }}" aria-label="Search">
            </form>
            <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger" style="position: relative; left:-70px;">Logout</button>
            </form>
            <a style="position: relative; left:-60px;" href="{{ route('cart') }}" class="btn btn-primary"><i class="ri-shopping-cart-fill" style="font-size: 20px;"></i></a>
          </div>
        </div>
      </nav>
      <img src="img/bun (1).png" style="margin-left: 100px; margin-top:40px;" alt="">

      <h3 style="margin-top: 30px;margin-left:100px;">List Buku : </h3>
      @foreach ($buku as $item)
    <div class="book-container">
      <img src="{{ $item->gambar }}" alt="{{ $item->namabuku }}" class="book-image">
      <p class="book-title">{{ $item->namabuku }}</p>
      <a href="{{ route('detail', ['namabuku' => $item->namabuku]) }}" class="btn  btn-pinjam">Cek Detail Buku</a>
    </div>
    @endforeach

    <style>
        .book-container {
            border: 1px solid #ccc;
        padding: 10px;
        margin: 20px;
        display: inline-block;
        text-align: center;
        height: 310px;
        position: relative;
        left:80px;
        width: 250px; /* Lebar box buku */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); /* Efek box shadow */
        }
  
        .book-image {
          width: 150px; /* Lebar gambar buku */
          height: 200px; /* Tinggi gambar buku */
          object-fit: cover; /* Memastikan gambar sesuai proporsi dan tidak terlalu membesar */
          border-radius: 5px; /* Efek sudut melengkung pada gambar */
        }
  
        .book-title {
          font-weight: bold;
          margin-top: 10px;
        }
  
        .btn-pinjam {
         background-color: #560bad;
         color: #fff;
         font-family: poppins;
        }
        .btn-pinjam:hover{
         background-color: #560bad;
         color: #fff;
         font-family: poppins;
        }
      </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>