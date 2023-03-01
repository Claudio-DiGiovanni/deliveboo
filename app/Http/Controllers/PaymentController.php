<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPaymentSession(Request $request)
    {
        // Imposta la chiave segreta di Stripe
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Crea un intento di pagamento
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->input('amount'),
            'currency' => 'eur',
            'description' => 'Ordine su DeliveBoo',
            'payment_method_types' => ['card'],
        ]);

        // Restituisce l'ID dell'intento di pagamento
        return response()->json(['paymentIntentId' => $paymentIntent->id]);
    }
}
