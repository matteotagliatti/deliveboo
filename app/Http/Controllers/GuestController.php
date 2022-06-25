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

        $amount = $request->total;
        $nonce = $request->nonce;
        $userName = $request->userName;

        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $userName,
            ],
        ]);

        if($result->success) {
            $transaction = $result->transaction;

            return response()->json([
                'message' => 'Transazione andata a buon fine. L\'ID è' . $transaction->id,
            ]);
        } else {
            return response()->json([
                'message' => 'Transazione non andata a buon fine.'
            ]);
      };
        
    }

    public function restaurants(){
        return view('guests.restaurants');
    }
}
