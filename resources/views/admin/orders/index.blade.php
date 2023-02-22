@extends('layouts.app')

@section('content')

<h1 class="justify-content-center d-flex">Lista ordini</h1>

<div class="">
    <table class="table table-striped">
        <tr class="table-success">
        <th>Numero ordine</th>
        <th>Data e ora</th>
        <th></th>
        </tr>
        @foreach ($orders as $order)
        <thead>

        </thead>
        <tbody>
            <tr>
                <td> {{$order->order_number}}</td>
                <td>  {{$order->created_at}}</td>
                <td>  <a href="{{ route('admin.orders.show', ['order' => $order]) }}" class="btn btn-outline-info">Info</a></td>
            </tr>
        </tbody>
        @endforeach
      </table>
</div>

@endsection
