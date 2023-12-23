<x-app>
    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div id="carouselExampleAutoplaying" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/images/landing-page/banner1.png') }}"
                                    class="d-block w-100 rounded-5 img-fluid" style="object-fit:contain" alt="banner1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/images/landing-page/banner2.png') }}"
                                    class="d-block w-100 rounded-5 img-fluid" style="object-fit:contain" alt="banner2">
                            </div>
                        </div>
                        <button class="carousel-control-prev position-absolute" type="button"
                            data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev"
                            style="left:-30px;opacity:1 !important;">
                            <span class="background-white text-primary" aria-hidden="true"
                                style="opacity: 1;width:40px;height:40px;border-radius:100%;display:flex;justify-content:center;align-items:center"><i
                                    class="bi bi-chevron-left"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next position-absolute" type="button"
                            data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next"
                            style="right:-30px;opacity:1 !important;">
                            <span class="background-white text-primary" aria-hidden="true"
                                style="opacity: 1;width:40px;height:40px;border-radius:100%;display:flex;justify-content:center;align-items:center"><i
                                    class="bi bi-chevron-right"></i></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="mb-4 border-bottom d-block" style="padding-block-end: 2px">
                        <h4 class="d-inline" style="border-bottom:3px solid #09AED7"><b><span
                                    class="text-primary">Product</span> Terbaik Tahun Ini</b></h4>
                    </div>
                    <div class="overflow-hidden py-3">
                        <div class="d-flex gap-3 overflow-x-auto scroll-d-none">
                            @foreach ($best_products as $product)
                                <a class="card border-0 text-decoration-none" style="min-width: 15rem;"
                                    href="{{ route('products.show', $product) }}">
                                    <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                        class="card-img-top rounded-3 img-fluid" alt="{{ $product->name }}"
                                        style="height: 170px;width:100%;object-fit:contain">
                                    <div class="mt-2">
                                        <p class="fs-5 m-0 fw-bold">{{ $product->name }}</p>
                                        <p>Rp {{ number_format($product->price, 0, '.', '.') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="mb-4 border-bottom d-block" style="padding-block-end: 2px">
                        <h4 class="d-inline" style="border-bottom:3px solid #09AED7"><b><span
                                    class="text-primary">Promo</span></b></h4>
                    </div>
                    <div class="overflow-hidden">
                        <div class="d-flex gap-3 overflow-x-auto scroll-d-none">
                            @foreach ($promotions as $promotion)
                                <a class="card border-0 text-decoration-none" style="min-width: 15rem;"
                                    href="{{ route('products.show', $product) }}">
                                    <img src="{{ asset('storage/images/products/' . $promotion->image) }}"
                                        class="card-img-top rounded-3 img-fluid" alt="{{ $promotion->name }}"
                                        style="height: 170px;width:100%;object-fit:contain">
                                    <div class="mt-2">
                                        <p class="fs-5 m-0 fw-bold">{{ $promotion->name }}</p>
                                        <p>Rp {{ number_format($promotion->price, 0, '.', '.') }} <span><small class="text-muted"><s>{{ number_format($promotion->price * 0.8, 0, '.', '.') }}</s></small></span></p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="mb-4 border-bottom d-block" style="padding-block-end: 2px">
                        <h4 class="d-inline" style="border-bottom:3px solid #09AED7"><b><span
                                    class="text-primary">Kategori </span></b></h4>
                    </div>
                    <div class="overflow-hidden py-3">


                        <div class="d-flex overflow-x-auto scroll-d-none" style="gap: 50px">
                            @foreach ($categories as $category)
                                <a class="card border-0 text-decoration-none" style="min-width: 7rem;max-width: 7rem;" href="{{ route('category.show', $category) }}">
                                    <img src="{{ asset('storage/images/categories/' . $category->image) }}"
                                        class="card-img-top img-fluid p-4" alt="{{ $category->name }}"
                                        style="background: white;border: 1px solid #09AED7;border-radius:100%">
                                    <div>
                                        <p class="fs-6 m-0 mt-2 fw-bold text-center">{{ $category->name }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mb-4 border-bottom d-block" style="padding-block-end: 2px">
                        <h4 class="d-inline" style="border-bottom:3px solid #09AED7"><b>Obat <span
                                    class="text-primary">Sehari-Hari</span></b></h4>
                    </div>
                    <div class="overflow-hidden py-3">
                        <div class="d-flex gap-3 overflow-x-auto scroll-d-none">
                            @foreach ($products as $product)
                                <a class="card border-0 text-decoration-none" style="min-width: 15rem;"
                                    href="{{ route('products.show', $product) }}">
                                    <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                        class="card-img-top rounded-3 img-fluid" alt="{{ $product->name }}"
                                        style="height: 170px;width:100%;object-fit:contain">
                                    <div class="mt-2">
                                        <p class="fs-5 m-0 fw-bold">{{ $product->name }}</p>
                                        <p>Rp {{ number_format($product->price, 0, '.', '.') }}</p>
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
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }

    .background-white {
        background: white !important;
    }

    .scroll-d-none::-webkit-scrollbar {
        display: none;
    }

    .card:hover {
        scale: 1.02;
    }
</style>
