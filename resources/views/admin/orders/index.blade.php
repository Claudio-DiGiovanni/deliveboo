@extends('layouts.app')

@section('content')

<h1 class="justify-content-center d-flex">Lista ordini</h1>

<div class="container d-flex justify-content-center flex-column align-items-center ">

@foreach ($orders as $order)
<div class="">
    <ul class="m-3 list-style-none; ">
        <li class="">
            {{$order->order_number}}
        </li>
        <li>
            {{$order->created_at}}
        </li>
        <a href="{{ route('admin.orders.show', ['order' => $order]) }}" class="btn btn-outline-info">Info</a>
    </ul>
</div>
@endforeach
</div>

@endsection
