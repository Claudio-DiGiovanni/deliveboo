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
                <td  style="vertical-align: middle"> {{$order->order_number}}</td>
                <td  style="vertical-align: middle"> {{($total_cost + $order->ship_cost) / 100}} €</td>
                <td  style="vertical-align: middle"> {{$order->address}}</td>
                <td  style="vertical-align: middle"> {{$order->customer_name}}</td>
                <td  style="vertical-align: middle"> {{$order->email}}</td>

                <td class="td_show_orders" >
                    <ul class="list-style p-0" >
                    @foreach ($dishes as $dish)
                    
                    <li  style="list-style: none"> {{$dish->name}}</li>
                    @endforeach
                </ul>
                    
                </td>
                <td style="vertical-align: middle">
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
