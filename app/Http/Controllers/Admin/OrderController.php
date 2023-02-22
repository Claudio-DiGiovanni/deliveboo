<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->query('search');
        $user = Auth::user();
        $orders = $user->orders();

        if ($query) {
            $orders = $orders->where('customer_name', 'like', '%' . $query . '%');
        }

        $orders = $orders->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $user = auth()->user();
        $orders = Order::whereHas('dishes.user', function ($query) use ($user) {
                        $query->where('id', $user->id);
                    })->get();
        $total_cost = 0;

        foreach ($orders as $orderx) {
            foreach ($orderx->dishes as $dish) {
                $total_cost += $dish->price;
            }
        }
        return view('admin.orders.show', [
            'order' => $order,
            'total_cost' => $total_cost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->dishes()->detach();
        $order->delete();
        return redirect()->route('admin.orders.index');
    }
}
