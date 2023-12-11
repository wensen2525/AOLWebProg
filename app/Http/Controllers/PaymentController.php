<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Purchase $purchase)
    {
        $totalAmount = 0;
        foreach($purchase->purchaseDetails as $purchaseDetail){
            $totalAmount += $purchaseDetail->totalPrice;
        }
        return view('payments.create',[
            'totalAmount' => $totalAmount,
            'purchase' => $purchase
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // PAYMENT DUE VALIDATION     
        if (strtotime($request->payment_due) < time())
            return redirect()->route('purchases.index')->with('failed', 'Your payment due has expired.');

        if ($request->hasFile('payment_proof')) {
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $proofNameToStore = $request->input('account_number') . '_' . $request->input('account_name') . '_' . time() . '.' . $extension;
            $request->file('payment_proof')->storeAs('public/images/payment/payment_proofs', $proofNameToStore);
        }

        Payment::create([
            'purchase_id' => $request->purchase_id,
            'payment_method' => $request->payment_method,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'payment_amount' => $request->payment_amount,
            'payment_proof' => $proofNameToStore,
            'is_verified' => 'accepted',
        ]);

        return redirect()->route('purchases.index')->with('Your payment has been confirmed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
