<x-app>
    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('import_category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="excel_category" class="form-control mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Import Category</button>
                    </form>

                    <form action="{{ route('import_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="excel_product" class="form-control mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Import Product</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app>
