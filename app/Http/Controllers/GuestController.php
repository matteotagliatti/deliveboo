<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;

class GuestController extends Controller
{
    public function index() {
        return view('guests.index');
    }

    public function show() {
        return view('guests.show');
    }

    public function checkout(Request $request)
    {

        return response()->json([
            'message' => 'Message from GuestController@index'
        ]);

        /* $amount = $request->total;
        return view('guests.index', compact('amount')); */

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
            return view('checkout') ->withErrors('An error occurred: ');
      }; */
    }

    public function restaurants(){
        return view('guests.restaurants');
    }
}
