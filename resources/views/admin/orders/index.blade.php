@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ordini:</h1>
@foreach ($orders as $order)
<div class="row">
    <ul class="col-5">
        <li>{{$order->order_number}}</li>
        <li>costo totale {{($total_cost + $order->ship_cost)/100}} €</li>

        <li>{{$order->addres}}</li>
        <li>{{$order->customer_name}}</li>
        <li>{{$order->email}}</li>
    </ul>
</div>
@endforeach
</div>

@endsection
