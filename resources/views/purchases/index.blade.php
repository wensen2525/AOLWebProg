<x-app>
    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-4">
                    @foreach ($purchases as $index => $purchase)
                        @if (count($purchase->purchaseDetails) > 0)
                            <div class="card p-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold">
                                        Order-{{ count($purchases) - $index }}-{{ count($purchase->purchaseDetails) }}
                                    </h5>
                                    <div class="d-flex gap-3 align-items-center">
                                        <b>Rp
                                            {{ number_format($purchase->totalPrice, 0, '.', '.') }}</b>
                                        @if ($purchase->is_verified == false && $purchase->payment_due > now())
                                            <a href="{{ route('payment', $purchase) }}" class="btn btn-primary">Bayar</a>
                                        @elseif($purchase->is_verified == false && $purchase->payment_due < now())
                                            <p class="m-0 text-danger fw-bold">Expired</p>
                                        @endif

                                    </div>

                                </div>

                                <ul style="list-style:decimal">
                                    @foreach ($purchase->purchaseDetails as $purchaseDetail)
                                        <li>
                                            <table class="col-12">
                                                <tr class="row mt-2">
                                                    <td class="col fw-bold">{{ $purchaseDetail->product->name }}</td>
                                                    <td class="col">
                                                        <div>
                                                            <div>Jumlah: <span
                                                                    class="fw-bold">{{ $purchaseDetail->quantity }}</span>
                                                            </div>
                                                            <div>Total Harga: <span class="fw-bold">Rp
                                                                    {{ number_format($purchaseDetail->totalPrice, 0, '.', '.') }}</span>
                                                                (<span class="text-muted"><small>{{ number_format($purchaseDetail->price, 0, '.', '.') }}/
                                                                        pcs</small></span>)
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-app>
