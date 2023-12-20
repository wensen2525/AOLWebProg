<footer class="bg-primary p-5 text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12 mb-5">
                <b class="fs-1">Holadoc</b>
                <br>
                <div class="py-4">
                      <b class="fs-5">Kontak Kami</b>
                      <br>
                      <div class="d-flex gap-2 mt-2">
                          <i class="bi bi-whatsapp"></i>
                          <p>
                              Whats App
                              <br>
                              +62 812-4423-3234
                          </p>
                      </div>
                      <div class="d-flex gap-2">
                          <i class="bi bi-telephone"></i>
                          <p>
                              Telepon Kami
                              <br>
                              +62 812-4423-3234
                          </p>
                      </div>
                </div>
                <b class="fs-5">Download App</b>
                <br>
                <div class="d-flex gap-3 pt-3">
                    <img class="img-fluid" src="{{ asset('storage/images/footer/get-in-ios.svg') }}" alt="get in app store">
                    <img class="img-fluid" src="{{ asset('storage/images/footer/get-in-android.svg') }}" alt="get in android">
                </div>

            </div>
            <div class="col-lg-7 col-12 mb-5">
                <div class="d-lg-flex gap-4 flex-">
                    <div class="mb-4">
                        <b class="fs-5">Kategori terbaik</b>
                        <ul class="p-0 m-0 pt-3" style="list-style: none">
                            <li><a href="{{ route('category.show', 1) }}" class="text-decoration-none text-white">Alergi</a></li>
                            <li><a href="{{ route('category.show', 2) }}" class="text-decoration-none text-white">Pencernaan</a></li>
                            <li><a href="{{ route('category.show', 3) }}" class="text-decoration-none text-white">Suplemen & Vitamin</a></li>
                        </ul>
                    </div class="mb-4">
                    <div>
                        <b class="fs-5">Customer Service</b>
                        <ul class="p-0 m-0 pt-3" style="list-style: none">
                            <li>Tentang Kami</li>
                            <li>Syarat dan Ketentuan</li>
                            <li>Pertanyaan Umum</li>
                            <li>Kebijakan Kami</li>
                            <li>Aturan Pengembalian</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr>
                <p class="text-center p-3">2023 All right reserved. Reliance Retail Ltd.</p>
            </div>

        </div>
    </div>
</footer>
