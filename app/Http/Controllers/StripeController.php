<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    


    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);


  
        // Stripe\Stripe::setPublishableKey(env('STRIPE_KEY'));
        // Stripe\Stripe::createToken([

        //     'number'=> $request->number,
        //     'cvc' => $request->cvc,
        //     'exp_month' => $request->exp_month,
        //     'exp_year' => $request->exp_year,

        // ]);
        
  
        return response()->json('success', 'Payment has been successfully processed.');
          
        return back();
    }




}
