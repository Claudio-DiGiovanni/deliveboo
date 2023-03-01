<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPaymentSession(Request $request)
{
    try {
        // Imposta la chiave segreta di Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Conferma l'intento di pagamento
        $paymentIntent = PaymentIntent::retrieve($request->input('payment_intent_id'));
        $paymentIntent->confirm();

        // Restituisce la conferma dell'intento di pagamento
        return response()->json(['paymentIntent' => $paymentIntent]);
    } catch (\Exception $e) {
        // Restituisce un messaggio di errore con una risposta JSON
        return response()->json(['error' => $e->getMessage()]);
    }
}
}
