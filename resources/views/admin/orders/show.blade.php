@extends('layouts.app')
@section('content')
    <div>
        <div class="background_img">
            <img class="img_background"
                src="https://media.discordapp.net/attachments/1031881470786154557/1079778610757521480/deliveboo-upscaling.png"
                alt="">
            <div
                class="container  container_home d-flex justify-content-center align-items-center flex-column h-100 container_show_order">
                <div class="container_order">
                    <div class="content_show_orders">
                        <div>

                            <div> <span class="grassetto">Numero ordine :</span> {{ $order->id }}</div>
                            <div> <span class="grassetto">Prezzo totale :</span> {{ $total_cost / 100 }} €</div>
                            <div> <span class="grassetto">Via :</span> {{ $order->address }}</div>
                            <div> <span class="grassetto">Nome :</span> {{ $order->customer_name }}</div>
                            <div> <span class="grassetto">Email :</span> {{ $order->email }}</div>
                            <div><span class="grassetto">Piatti :</span>
                                <ul>
                                    @foreach ($dishes as $dish)
                                        <li> {{ $dish->name }}</li>
                                    @endforeach
                                </ul>
                            </div>


                        </div>

                        <div class="white">
                            <button id="delete" class="btn btn-outline-danger" onclick="showPopup(event)"
                                data-id="{{ $order->id }}">Elimina</button>
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
                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            @foreach ($dishes as $dish)
                <div class="ms-2 me-auto">

                    {{ $dish->name }}
                   
                      
                      
                            
                           
                    
                   
                        
                </div>
                <span class="badge bg-primary rounded-pill">
                    {{$count}}
                   </span>
            @endforeach
            
        </li>
    </ol>
@endsection
