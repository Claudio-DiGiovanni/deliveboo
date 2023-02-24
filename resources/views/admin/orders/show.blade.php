@extends('layouts.app')
@section('content')

<div>
<div class="container ">
    <table class="table table-striped">
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
            <tr>
                <td > {{$order->id}}</td>
                <td > {{$total_cost / 100}} €</td>
                <td > {{$order->address}}</td>
                <td > {{$order->customer_name}}</td>
                <td > {{$order->email}}</td>

                <td class="td_show_orders" >
                    <ul class="p-0" >
                    @foreach ($dishes as $dish)

                    <li> {{$dish->name}}</li>
                    @endforeach
                </ul>

                </td>
                <td>
                    <button id="delete" class="btn btn-outline-danger" onclick="showPopup(event)" data-id="{{$order->id}}">Elimina</button>
                        <div class="background">
                            <div class="popup">
                                <h5 class="w-100 text-center mb-3">Sei sicuro di volerlo eliminare?</h5>
                                <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                                <button class="btn btn-secondary" id="retry" onclick="hidePopup()">Annulla</button>
                            </div>
                        </div>
                </td>
            </tr>

        </tbody>

      </table>

</div>
</div>

@endsection
