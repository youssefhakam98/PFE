@extends('layouts.app')

@section('content')


<div class="content-body">



    <div class="container">
        <form id="add-sale" action="{{ route("sales.store") }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="row">
                        <div class="my-2 col-md-3">
                            <h3 class="text-muted border-bottom">
                                {{ Carbon\Carbon::now() }}
                            </h3>
                        </div>
                    </div>

                    <div class="card ">
                        <div class="card-body ">
                            <div class="row">
                                @foreach ($tables as $table)
                                     @foreach ($table->sales as $sale)
                                        @if ($sale->created_at >= Carbon\Carbon::today())
                                <div class="col-md-3 ">

                                    <div class="card p-2 mb-2 d-flex
                            flex-column justify-content-center
                            align-items-center
                            list-group-item-action ">

                                        <div style="border : dashed pink" class="mb-2 mt-2 shadow w-100"
                                            id="{{ $sale->id }}">
                                            <div class="card-body d-flex    
                                            flex-column justify-content-center
                                            align-items-center">
                                                <h4 class="text-center">
                                                    <i class="fa fa-chair fa-5x"></i>
                                                    <span class="mt-2 text-muted font-weight-bold">
                                                        {{ $table->name }}
                                                    </span>
                                                </h4>
                                                @foreach ($sale->menus()->where("sales_id",$sale->id)->get() as
                                                $menu)
                                                <h5 class="font-weight-bold">
                                                    {{$menu->title}}
                                                </h5>
                                                <span class="text-muted">
                                                    {{$menu->price}} DH
                                                </span>

                                                @foreach ($servents as $servent)
                                                @if ($servent->id == $sale->servant_id)
                                                <span class="badge badge-danger mt-3">
                                                    Sérveur : {{ $servent->name }}
                                                </span>
                                                @endif
                                                @endforeach

                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light text-dark">
                                                        Qté : {{$sale->quantity}}
                                                    </span>

                                                </h5>

                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light text-dark">
                                                        Prix : {{$sale->total_price}} DH
                                                    </span>

                                                </h5>

                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light text-dark">
                                                        Total : {{$sale->total_received}} DH
                                                    </span>

                                                </h5>

                                                <h5 class="font-weight-bold  mt-2">
                                                    <span class="badge badge-light text-dark">
                                                        Reste : {{$sale->change}} DH
                                                    </span>
                                                </h5>

                                                <h5 class="font-weight-bold  mt-2">
                                                    <span class="badge badge-light text-dark">
                                                        Type de paiement :
                                                        {{$sale->payment_type === "cash" ? "Espéce" : "Carte bancaire"}}
                                                    </span>
                                                </h5>


                                                <h5 class="font-weight-bold  mt-2">
                                                    <span class="badge badge-light text-dark">
                                                        Etat de paiement :
                                                        {{$sale->payment_status === "paid" ? "Payé" : "Impayé"}}
                                                    </span>


                                                </h5>

                                                <div class="d-flex
                                                            flex-column justify-content-center
                                                            align-items-center">
                                                    <span class="font-weight-bold">
                                                        Restaurant BOURANJA
                                                    </span>

                                                    <span class="font-weight-bold">
                                                        Adreess : Darna.com
                                                    </span>
                                                    <span class="font-weight-bold">
                                                        Tel : 06xx xx xx xx
                                                    </span>
                                                </div>

                                                @endforeach

                                            </div>


                                        </div>

                                        <div class="mt-2 d-flex justify-content-center">
                                            <a href="{{url("sales/edit", $sale->id) }}"
                                                class="btn btn--sm btn-warning mr-1">
                                                <i class="fa fa-edit "></i>
                                            </a>

                                            <a href="#" target="_blank" class="btn btn--sm btn-primary"
                                                onclick="print({{$sale->id}})">
                                                <i class="fas fa-print "></i>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                               
                                    
                                {{-- @else
                                   
                                <div>
                                    <span class="text-danger" >
                                        ooooops
                                    </span>
                                </div>
                               --}}


                                @endif


                                @endforeach

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>




</div>
















@endsection



@section('javascript')
<script>
    function print(el){
            const page  = document.body.innerHTML;
            const content = document.getElementById(el).innerHTML;
            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = page;

        }
</script>
@endsection

