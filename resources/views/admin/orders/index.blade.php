@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ordini:</h1>

    @if(count($orders) > 0)
    @foreach($orders as $order)
    <div class="row">
        <ul class="col-5">
            <a href="{{ route('admin.orders.show', ['order' => $order]) }}" class="btn btn-outline-info">Info</a>
            <li>
                {{$order->order_number}}
            </li>
            <li>
                {{$order->created_at}}
            </li>
        </ul>
    </div>
    @endforeach
@else
    <p>No orders found.</p>
@endif

</div>

@endsection
