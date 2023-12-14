<x-app>
    <section>
        <div class="container py-4">
            <div class="row">
                <!-- Header (Category Description) -->
                <div class="col-12 mb-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <img class="rounded-3 mx-auto d-block img-fluid"
                                src="{{ asset('storage/images/categories/' . $category->image) }}"
                                style="height: 180px;width:300px;object-fit:contain" />
                        </div>

                        <div class="col-9">
                            <div class="text-left fw-bold fs-3 mb-3">{{ $category->name }}</div>
                            <div class="text-left lh-sm fs-7">Lorem ipsum dolor sit, amet
                                consectetur adipisicing elit. Consequuntur distinctio magnam, quidem nostrum
                                exercitationem nesciunt hic delectus harum? Dolores, perspiciatis sequi. Quaerat porro
                                consequatur nemo eius. Nobis voluptatem laudantium modi sit? Aliquid, amet, veniam
                                corporis tempore blanditiis aliquam quae, praesentium sed quos esse sequi inventore.
                                Distinctio dicta corrupti aliquid fugiat?
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Header (Category Description) -->
                <div class="col-12 mb-4">
                    <!-- List Product Title -->
                    <div class="fs-4 fw-bold">Produk</div>
                    <!-- End List Product Title -->

                    <!-- List Item -->
                    <div class="overflow-hidden py-3">
                        <div class="d-flex flex-wrap gap-3 overflow-x-auto scroll-d-none">
                            @foreach ($category->products as $other_product)
                                <a class="card border-0 text-decoration-none position-relative"
                                    style="min-width: 16rem;max-width:16rem"
                                    href="{{ route('products.show', $other_product) }}">
                                    <img src="{{ asset('storage/images/products/' . $other_product->image) }}"
                                        class="card-img-top rounded-3 img-fluid" alt="{{ $other_product->name }}"
                                        style="height: 170px;width:100%;object-fit:cover">
                                    <div class="mt-2">
                                        <p class="fs-5 m-0 fw-bold">{{ $other_product->name }}</p>
                                        <p>Rp {{ number_format($other_product->price, 0, '.', '.') }}</p>
                                    </div>
                                </a>
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
