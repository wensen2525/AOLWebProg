<x-app>
    <section>
        <div class="container py-4">
            <h3 class="fw-bold text-center">KATEGORI</h3>
            <div class="row">
                @foreach ($categories as $category)
                    <a class="col-4 p-3 scale text-decoration-none" href="{{ route('category.show', $category) }}">
                        <div
                            class="bg-outline-primary d-flex gap-5 justify-content-center align-items-center p-4 rounded-4">
                            <img style="width:120px;height:120px;object-fit:cover"
                                src="{{ asset('storage/images/categories/' . $category->image) }}" class="img-fluid"
                                alt="{{ $category->name }}">
                            <div class="fs-4 fw-bold">
                                {{ $category->name }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-app>
<style>
    .scale:hover {
        scale: 1.02;
    }
    .bg-outline-primary{
        border: 1px solid #09AED7;
    }
</style>
