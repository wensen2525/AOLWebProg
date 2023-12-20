<x-app>
    <section>
        <div class="container py-4">
            <form class="row " method="POST" action="{{ route('purchases.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    @foreach ($carts as $cart)
                        <div class="row align-items-center">
                            <div class="col-1">
                                <input type="checkbox" class="form-check-input border-dark" name="{{ $cart->id }}"
                                    value="{{ $cart->id }}" id="{{ $cart->id }}" />
                            </div>
                            <div class="col-11 d-flex gap-4 align-items-center">
                                <img class="img-fluid" src="{{ asset('storage/images/products/' . $cart->product->image) }}"
                                    style="width: 300px;height:150px;object-fit:contain" />
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div>
                                        <div class="text-left fw-bold" style="font-size: 25px">
                                            {{ $cart->product->name }}
                                        </div>
                                        <div class="text-left lh-lg" style="padding-bottom: 10px">
                                            Rp
                                            {{ number_format($cart->product->price, 0, '.', '.') }}
                                        </div>
                                        {{-- <div class="text-left">Quantity : 3</div> --}}

                                        <div class="panel">
                                            <div class="input-group quantity-group my-3 rounded-2"
                                                style="width: 200px;">
                                                <div class="text-left mb-3">Sub
                                                    Total : <span id="totalPriceProduct_{{ $cart->id }}">Rp
                                                    {{ number_format($cart->product->price * $cart->stock, 0, '.', '.') }}</span>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-left-minus btn btn-primary btn-number"
                                                            style="border-radius:100%" data-type="minus" data-field="">
                                                            <span><i class="bi bi-dash-lg"></i></span>
                                                        </button>
                                                    </span>
                                                    <input type="hidden" id="cart_id" value="{{ $cart->id }}">
                                                    <input type="hidden" id="price"
                                                        value="{{ $cart->product->price }}">
                                                    <input type="hidden" id="token" value="{{ csrf_token() }}" name="_token">
                                                    <input type="number" id="quantity"
                                                        class="form-control input-number text-center border-0"
                                                        value="{{ $cart->stock }}" min="1" max="20">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-right-plus btn btn-primary btn-number"
                                                            style="border-radius:100%" data-type="plus" data-field="">
                                                            <span><i class="bi bi-plus-lg"></i></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                
                                            </div>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('cart_delete', $cart) }}" class="text-danger"><i
                                                class="bi bi-trash3-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (count($carts) > 0)
                    <div class="col-12 ">
                        <button type="submit" class="d-block ms-auto btn btn-primary">Check Out</button>
                    </div>
                @else
                    <p class="m-0 py-5 fs-4 text-center">Tidak ada produk!</p>
                @endif
            </form>
        </div>
    </section>
</x-app>
