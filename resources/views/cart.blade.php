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
      .col-1 {
        padding-top: 50px;
      }

      .search {
        border-radius: 12px;
      }

      .buttonCheck {
        border-radius: 12px;
      }

      .form-check-input {
        font-size: 25px;
      }
    </style>
    <!-- NavBar -->
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

    <!-- Body 1 -->
    <section class="container" style="margin-top: 5rem">
      <div class="row">
        <div class="col-1">
          <!-- <i class="bi bi-check-square px-3" style="font-size: 25px"></i> -->
          <input type="checkbox" class="form-check-input" id="myCheckbox" onclick="toggleCheckbox()" />
        </div>
        <div class="col-5">
          <img class="img-fluid img-thumbnail" src="{{asset('storage/images/products/Panadol.png')}}" />
        </div>

        <div class="col-4 ms-auto">
          <div class="text-left fw-bold" style="font-size: 16px">Panadol</div>
          <div class="text-left lh-lg" style="padding-bottom: 10px">Rp 30.000</div>
          <div class="text-left">Quantity : 3</div>
          <div class="text-left">Sub Total : 90.000</div>
        </div>
      </div>
    </section>

    <!-- <div class="container mt-4">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="myCheckbox" onclick="toggleCheckbox()">
        <label class="form-check-label" for="myCheckbox">Check me</label>
      </div>
    </div> -->

    <!-- Body 2 -->
    <section class="container" style="margin-top: 5rem">
      <div class="row">
        <div class="col-1">
          <input type="checkbox" class="form-check-input" id="myCheckbox" onclick="toggleCheckbox()" />
        </div>
        <div class="col-5">
          <img class="img-fluid img-thumbnail" src=" {{asset('storage/images/products/Panadol.png')}} " />
        </div>

        <div class="col-4 ms-auto">
          <div class="text-left fw-bold" style="font-size: 16px">Panadol</div>
          <div class="text-left lh-lg" style="padding-bottom: 10px">Rp 30.000</div>
          <div class="text-left">Quantity : 3</div>
          <div class="text-left">Sub Total : 90.000</div>
        </div>
      </div>
    </section>

    <!-- Body 3 -->
    <section class="container" style="margin-top: 5rem">
      <div class="row">
        <div class="col-1">
          <input type="checkbox" class="form-check-input" id="myCheckbox" onclick="toggleCheckbox()" />
        </div>
        <div class="col-5">
          <img class="img-fluid img-thumbnail" src="{{asset('storage/images/products/Panadol.png')}}" />
        </div>

        <div class="col-4 ms-auto">
          <div class="text-left fw-bold" style="font-size: 16px">Panadol</div>
          <div class="text-left lh-lg" style="padding-bottom: 10px">Rp 30.000</div>
          <div class="text-left">Quantity : 3</div>
          <div class="text-left">Sub Total : 90.000</div>
        </div>
      </div>
    </section>

    <!-- Spacing -->
    <div class="container mt-4" style="visibility: hidden">space</div>
    <!-- End Spacing -->

    <!-- Check Out -->
    <section class="container mt-5">
      <div class="text-left lh-lg" style="padding-bottom: 10px">Jumlah Barang : 2</div>
      <div class="text-left pb-4">Total Harga : 180.000</div>
      <a href="/payment" type="button" class="buttonCheck btn btn-outline-dark">Check Out</a>
    </section>
    <!-- End Checkout -->

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

    <script>
      const checkbox = document.getElementById("myCheckbox");

      function toggleCheckbox() {
        var checkbox = document.getElementById("myCheckbox");
      }
      checkbox.checked = !checkbox.checked;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
