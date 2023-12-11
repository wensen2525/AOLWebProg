<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hello Doc</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  </head>
  <body>
    <style>
      .buttonCheck {
        border-radius: 12px;
        width: 75%;
      }
    </style>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow" style="background-color: #66a6f8">
      <div class="container">
        <a class="navbar-brand px-3" href="#">Hello Doc</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item px-3">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#About">Category</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#Education">Shopping Cart</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Spacing -->
    <div class="container mt-5" style="visibility: hidden">space</div>
    <div class="container" style="visibility: hidden">space</div>
    <!-- End Spacing -->

    <div class="container">Sub Total: 180.000</div>

    <!-- Spacing -->
    <div class="container mt-3" style="visibility: hidden">space</div>
    <!-- End Spacing -->

    <div class="container">
      <div class="text-left fw-bold">Payment Method</div>
    </div>

    <!-- Card buat Payment Method -->
    <section class="container mt-4">
      <div class="row">
        <div class="col-3">
          <div class="card">
            <img src="{{asset('storage/images/products/Panadol.png')}}" class="card-img-top" alt="" />
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <img src="{{asset('storage/images/products/Panadol.png')}}" class="card-img-top" alt="" />
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <img src="{{asset('storage/images/products/Panadol.png')}}" class="card-img-top" alt="" />
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <img src="{{asset('storage/images/products/Panadol.png')}}" class="card-img-top" alt="" />
          </div>
        </div>
      </div>
    </section>

    <div class="container mt-5">
      <div class="text-left fw-bold">Jenis Pengiriman</div>
      <!-- Card Start -->
      <div class="card w-100 mt-2">
        <div class="card-body">
          <h5 class="card-title">JNE Reguler</h5>
        </div>
      </div>
      <!-- End Cart -->

      <!-- Card Start -->
      <div class="card w-100 mt-2">
        <div class="card-body">
          <h5 class="card-title">Sicepat</h5>
        </div>
      </div>
      <!-- End Cart -->

      <!-- Card Start -->
      <div class="card w-100 mt-2">
        <div class="card-body">
          <h5 class="card-title">JNT</h5>
        </div>
      </div>
      <!-- End Cart -->
    </div>

    <div class="container mt-5">
      <div class="row">
        <div class="col-6">
          <div class="text-left">Total : 210.000</div>
        </div>

        <div class="col-6 d-md-flex justify-content-md-end">
          <button type="button" class="buttonCheck btn btn-outline-dark">Pay</button>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2023 Hello Doc, Kel 3</p>

        <ul class="nav col-md-4 justify-content-end">
          <i class="icon bi bi-instagram px-2"></i>
          <i class="icon bi bi-twitter px-2"></i>
          <i class="icon bi bi-github px-2"></i>
          <i class="icon bi bi-facebook px-2"></i>
        </ul>
      </footer>
    </div>
    <!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
