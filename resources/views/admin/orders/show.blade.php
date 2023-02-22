@extends('layouts.app')
@section('content')

<div>
<div class="container ">
    <table class="table table-striped w-100">
        <thead>
       <tr class="table-success ">
        <th>Numero ordine</th>
        <th>Prezzo totale</th>
        <th>Via</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Piatti</th>
        <th></th>
       </tr>
        </thead>
        <tbody>
            <tr class=" ">
                <td> {{$order->order_number}}</td>
                <td> {{($total_cost + $order->ship_cost) / 100}} €</td>
                <td> {{$order->address}}</td>
                <td> {{$order->customer_name}}</td>
                <td> {{$order->email}}</td>

                <td>
                    <ul class="list-style p-0" >
                    @foreach ($dishes as $dish)
                    
                    <li  style="list-style: none"> {{$dish->name}}</li>
                    @endforeach
                </ul>
                    
                </td>
                <td>
                    <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post">
                         @method('DELETE')
                         @csrf
                        <button class="btn btn-outline-danger">Elimina</button>
                    </form>
                </td>
            </tr>

        </tbody>

      </table>

</div>
</div>

@endsection
