@extends('layouts.app')

@section('content')
@foreach ($orders as $order)
<div class="row">
    <div class="col-5">
        <span>{{$order->order_number}}</span>
        <span>{{$order->ship_cost / 100}} €</span>
        <span>{{$order->addres}}</span>
        <span>{{$order->customer_name}}</span>
        <span>{{$order->email}}</span>
    </div>
    {{-- <div class="col-3">
        <img class="w-25" src="{{$orders->image}}" alt="">
    </div> --}}
</div>
@endforeach
@endsection
