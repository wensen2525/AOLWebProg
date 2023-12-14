<x-app>
    <section>
        <div class="container py-4">
            <div class="row">
                <!-- Header (Category Description) -->
                <div class="col-12 mb-4">
                    <div class="row">
                        <div class="col">
                            <img class="rounded-3 mx-auto d-block img-fluid"
                                src="{{ asset('storage/images/products/' . $product->image) }}"
                                style="height: 180px;width:300px;object-fit:contain" />
                        </div>

                        <div class="col-9">
                            <div class="text-left fs-7 " style="font-size: 12px; color: rgb(128, 128, 128);">
                                {{ $product->category->name }}
                            </div>
                            <div class="text-left fw-bold fs-3">{{ $product->name }}</div>
                            <div class="text-left lh-sm fs-7">{!! $product->description !!} Lorem ipsum dolor sit, amet
                                consectetur adipisicing elit. Consequuntur distinctio magnam, quidem nostrum
                                exercitationem nesciunt hic delectus harum? Dolores, perspiciatis sequi. Quaerat porro
                                consequatur nemo eius. Nobis voluptatem laudantium modi sit? Aliquid, amet, veniam
                                corporis tempore blanditiis aliquam quae, praesentium sed quos esse sequi inventore.
                                Distinctio dicta corrupti aliquid fugiat?
                            </div>
                            <form method="POST" action="{{ route('purchases.store') }}" enctype="multipart/form-data" class="d-flex gap-4 align-items-center justify-content-between">
                              @csrf
                              <input type="hidden" value="{{ $product->id }}" name="product">
                                <div class="panel">
                                    @if (isset($product->stock) && $product->stock != 0)
                                        <div class="input-group quantity-group my-3 rounded-2" style="width: 200px;">
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    class="quantity-left-minuss btn btn-primary btn-number"
                                                    style="border-radius:100%" data-type="minus" data-field="">
                                                    <span><i class="bi bi-dash-lg"></i></span>
                                                </button>
                                            </span>
                                            <input type="number" id="quantity" name="quantity"
                                                class="form-control input-number text-center border-0" value="1"
                                                min="1" max="{{ $product->stock }}">
                                            <span class="input-group-btn">
                                                <button type="button"
                                                    class="quantity-right-pluss btn btn-primary btn-number"
                                                    style="border-radius:100%" data-type="plus" data-field="">
                                                    <span><i class="bi bi-plus-lg"></i></span>
                                                </button>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex gap-3">
                                    <div>
                                        <button type="submit" formaction="{{ route('cart.store') }}" formmethod="POST" class="btn btn-outline-primary">Tambah ke
                                            keranjang</button>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Bayar Langsung</button>
                                    </div>
                                </div>

                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <p class="fw-bold">Deskripsi</p>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="col-12 mb-4">
                    <p class="fw-bold">Komposisi</p>
                    <p>{{ $product->ingredients }}</p>
                </div>
                <div class="col-12 mb-4">
                    <p class="fw-bold">Cara pemakaian</p>
                    <p>{{ $product->howtouse }}</p>
                </div>
                <div class="col-12 mb-4">
                    <p class="fw-bold">Dosis</p>
                    <p>{{ $product->dose }}</p>
                </div>
                <div class="col-12 mb-4">
                    <p class="fw-bold">Efek Samping</p>
                    <p>{{ $product->sideeffects }}</p>
                </div>
                <div class="col-12 mb-4">
                    <!-- List Product Title -->
                    @if(count($other_products) > 1)
                    <div class="fs-4 fw-bold">Produk lainnya yang mungkin cocok dengan kamu</div>
                    @endif
                    <!-- End List Product Title -->

                    <!-- List Item -->
                    <div class="overflow-hidden py-3">
                        <div class="d-flex gap-3 overflow-x-auto scroll-d-none">
                            @foreach ($other_products as $other_product)
                                @if($other_product->id != $product->id)
                                <a class="card border-0 text-decoration-none position-relative"
                                    style="min-width: 15rem;max-width:15rem"
                                    href="{{ route('products.show', $other_product) }}">
                                    <img src="{{ asset('storage/images/products/' . $other_product->image) }}"
                                        class="card-img-top rounded-3 img-fluid" alt="{{ $other_product->name }}"
                                        style="height: 170px;width:100%;object-fit:contain">
                                    <div class="mt-2">
                                        <p class="fs-5 m-0 fw-bold">{{ $other_product->name }}</p>
                                        <p>Rp {{ number_format($other_product->price, 0, '.', '.') }}</p>
                                    </div>
                                    {{-- <div class="card-img-overlay">
                                        <p class="card-text position-absolute"
                                            style="right: 20px;background:white;width:30px;height:30px;display:flex;justify-content:center;align-items:center;border-radius:100%;color:#09AED7">
                                            <i class="bi bi-cart"></i>
                                        </p>
                                    </div> --}}
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>
<style>
    .scroll-d-none::-webkit-scrollbar {
        display: none;
    }
</style>
