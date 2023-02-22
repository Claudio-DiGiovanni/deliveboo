@extends('layouts.app')
@section('content')

<div>
    <ul>
        <li>
           {{$order->order_number}}
        </li>
        <li>
         {{($total_cost + $order->ship_cost) / 100}} €
         </li>
         <li>
            {{$order->address}}
         </li>
         <li>
            {{$order->customer_name}}
         </li>
         <li>
            {{$order->email}}
         </li>
    </ul>
    <div class="col-4 d-flex ">
        <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-danger">Elimina</button>
        </form>
    </div>
</div>

@endsection
