<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Order;

class CheckOwner
{
    public function handle(Request $request, Closure $next, $model, $userId)
    {
        $user = Auth::user();

        if ($model == 'dish') {
            $dish = Dish::findOrFail($request->route('dish'));
            if ($dish->user_id == $userId) {
                return $next($request);
            }
        } elseif ($model == 'order') {
            $order = Order::findOrFail($request->route('order'));
            if ($order->dish->user_id == $userId) {
                return $next($request);
            }
        }

        return redirect('/admin');
    }
}
