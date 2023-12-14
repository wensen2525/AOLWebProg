<x-app>
      <section>
            <div class="container py-4">
                  <div class="row">
                        <div class="col">
                              <h4 class="fw-bold mb-3">Alamat Baru</h4>
                              <form action="{{ route('address.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                          <label for="">Nama</label>
                                          <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                          <label for="">Alamat Lengkap</label>
                                          <textarea class="form-control" name="address" required style="height: 200px"></textarea>
                                    </div>
                                    <div class="mb-3">
                                          <button class="btn btn-primary" type="submit">Tambah</button>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      </section>
</x-app>