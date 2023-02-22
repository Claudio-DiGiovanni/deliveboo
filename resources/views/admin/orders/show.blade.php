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
</div>

@endsection
