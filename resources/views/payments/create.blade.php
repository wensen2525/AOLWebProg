<x-app>
    <section>
        <div class="container py-4">
            <form class="row" method="POST" enctype="multipart/form-data" action="{{ route('purchases.update', $purchase) }}">
                @csrf
                <div class="col-12 mb-4">
                    <h4 class="fw-bold">Produk</h4>
                    <div class="overflow-hidden py-3">
                        <div class="d-flex gap-3 overflow-x-auto scroll-d-none">
                            @foreach ($purchase->purchaseDetails as $purchaseDetail)
                                <a class="card border-0 text-decoration-none" style="min-width: 15rem;"
                                    href="{{ route('products.show', $purchaseDetail->product) }}">
                                    <img src="{{ asset('storage/images/products/' . $purchaseDetail->product->image) }}"
                                        class="card-img-top rounded-3 img-fluid"
                                        alt="{{ $purchaseDetail->product->name }}"
                                        style="height: 170px;width:100%;object-fit:cover">
                                    <div class="mt-2">
                                        <p class="fs-5 m-0 fw-bold">{{ $purchaseDetail->product->name }}</p>
                                        <p>Rp {{ number_format($purchaseDetail->totalPrice, 0, '.', '.') }}
                                            <span><small>({{ number_format($purchaseDetail->price, 0, '.', '.') }} / pcs)</small></span>
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>


                    <div class="d-flex gap-3">
                        <div class="w-50">
                            <p class="text-left fw-bold">Jenis Pengiriman</p>
                            <select class="form-select" name="delivery_type" id="" required>
                                <option value="JNE | Regular">JNE | Regular</option>
                                <option value="JNT | Regular">JNT | Regular</option>
                                <option value="Si Cepat">Si Cepat</option>
                            </select>
                        </div>
                        <div class="w-50">
                            <p class="text-left fw-bold">Jenis Pembayaran</p>
                            <select class="form-select" name="payment_type" id="" required>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BRI">BRI</option>
                                <option value="OVO">OVO</option>
                                <option value="Dana">Dana</option>
                            </select>
                        </div>
                        <div class="w-50">
                            <p class="text-left fw-bold">Alamat Pengiriman</p>
                            @if (count($user->addresses) > 0)
                            <select class="form-select" name="address_id" id="" required>
                                
                                    @foreach ($user->addresses as $address)
                                        <option value="{{ $address->id }}">{{ $address->name }} <small class="text-muted">({{ $address->address }})</small></option>
                                    @endforeach
                                    
                                
                            </select>
                            <a class="btn btn-primary mt-3" href="{{ route('address.create') }}">Tambah Alamat</a>
                            @else
                                <a class="btn btn-primary" href="{{ route('address.create') }}">Tambah Alamat</a>
                            @endif
                        </div>
                    </div>




                    <div class="d-flex justify-content-between align-items-center py-3 px-4 mt-5 bg-primary">
                        <div class="col-6">
                            <div class="text-left m-0 fw-bold">Total : Rp
                                {{ number_format($purchase->totalPrice, 0, '.', '.') }}</div>
                        </div>
                        @if ($purchase->is_verified == false)
                        @method('PUT')
                            <div class="col-6 d-md-flex justify-content-md-end">
                                <button type="submit" class="px-3 btn btn-outline-dark">Pay</button>
                            </div>
                        @else
                            <div class="col-6 d-md-flex justify-content-md-end align-items-center gap-3">
                                Pembayaran kamu sudah terverifikasi
                                <a type="button" href="{{ route('purchases.index') }}"
                                    class="px-3 btn btn-outline-dark">Back</a>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app>
<style>
    .scroll-d-none::-webkit-scrollbar {
        display: none;
    }
</style>
