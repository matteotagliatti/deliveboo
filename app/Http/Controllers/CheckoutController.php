<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request) {
        /* $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $amount = $request->amount;
        $name = $request->name;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $name,
            ],
        ]);

        if($result->success) {
            $transaction = $result->transaction;

            return view('checkout', [
                'message' => "Transaction successful. The ID is' $transaction->id",
                'amount' => $transaction->amount,
                'name' => $transaction->customer['firstName']
            ]);
        } else {
            return view('checkout')/* ->withErrors('An error occurred: ') */;
    }
}
