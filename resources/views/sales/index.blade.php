{{-- @extends('layouts.app')

@section('content')

<div class="py-12">



    <div class="container">



        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

                                @include('layouts.sidebar')

                            </div>

                            <div class="col-md-8">

                                <div
                                    class="d-flex flex-row justify-content-between align-items-center border-bottom pd-1">
                                    <h3 class="text-secondry">
                                        <i class="fas fa-credit-card"></i>All Vents

                                    </h3>
                                    <a href="{{ url("create/menu") }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>


                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">table</th>
                                            <th scope="col">Serveur</th>
                                            <th scope="col">Quntity</th>
                                            <th scope="col">total</th>
                                            <th scope="col">Type de payment</th>
                                            <th scope="col">Etat de payment</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @php($i = 1)  --}}
                                        {{-- @foreach ($sales->menus()->where("sales_id", $sale_id)->get() as $sale)
                                        
                                        <tr>
                                            <th scope="row"> {{ $sale->id }} </th>
                                            <td>
                                                @foreach($sales as $menu)
                                                <div class="col-md-4 mb-2">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex
                                                                        flex-column justify-content-center
                                                                        align-items-center">
                                                           
                                                            <img src="{{ asset($menu->image) }}"
                                                                alt="{{ $menu->title }}" class="fluid rounded-circle"
                                                                style=" width:50px; height:50px; object-fit:cover ">
                                                            <h5 class="font-weight-bold mt-2">
                                                                {{ $menu->title }}
                                                            </h5>
                                                            <h5 class="text-muted">
                                                                {{ $menu->price }} DH
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach 
                                            </td>
                                            <td>  @foreach( as $table)
                                                <div class="col-md-4 mb-2">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex
                                                                        flex-column justify-content-center
                                                                        align-items-center">
                                                           
                                                            <i class="fa fa-chair fa-3x" ></i>
                                                            <h5 class="text-muted mt-2">
                                                                {{ $table->name }}                                                             </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach 
                                            </td>
                                            <td> {{ $sale->servant->name }} </td>
                                            <td> {{ $sale->quantity  }} </td>
                                            <td> {{ $sale->payment_type === "cash" ? "Espéce" : "carte bancaire"  }} </td>
                                            <td> {{ $sale->payment_status === "paid" ? "Payé" : "Impayé"  }} </td>
                                            <td> <img src="{{ asset($sale->image) }}" alt="{{ $sale->title }}"
                                                    class="fluid rounded"
                                                    style=" width:100px; height:100px; object-fit:cover "> </td>


                                            <td>
                                                <a href=" {{ url('sale/edit/'.$sale->id) }} "
                                                    class="btn btn-info">Edit</a>
                                                <a href=" {{ url('delete/sale/'.$sale->id) }} " class="btn btn-danger">


                                                    Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">

                                    {{ $sales->links('pagination::bootstrap-4') }}
                                </div>


                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

@endsection --}} 



@extends('layouts.app')


@section("content")
    <div class="content-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                        <h3 class="text-secondary">
                                            <i class="fas fa-credit-card"></i> Ventes
                                        </h3>
                                        <a href="{{url("payments")}}" class="btn btn-primary">
                                            <i class="fas fa-plus fa-x2"></i>
                                        </a>
                                    </div>
                                    <table class="table table-hover table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Menus</th>
                                                <th>Tables</th>
                                                <th>Sérveur</th>
                                                <th>Quantité</th>
                                                <th>Total</th>
                                                <th>Type de paiement</th>
                                                <th>Etat de paiement</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>
                                                        {{ $sale->id }}
                                                    </td>
                                                    <td>
                                                        @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                                                            <div class="col-md-4 mb-2">
                                                                <div class="h-100">
                                                                    <div class="d-flex
                                                                    flex-column justify-content-center
                                                                    align-items-center">
                                                                    <img src="{{ asset($menu->image) }}" alt="{{ $menu->title }}"
                                                                    class="fluid rounded"
                                                                    style=" width:50px; height:50px; object-fit:cover ">
                                                                        <h5 class="font-weight-bold mt-2">
                                                                            {{ $menu->title }}
                                                                        </h5>
                                                                        <h5 class="text-muted">
                                                                            {{ $menu->price }} DH
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                                                            <div class="col-md-4 mb-2">
                                                                <div class="h-100">
                                                                    <div class="d-flex
                                                                    flex-column justify-content-center
                                                                    align-items-center">
                                                                        <i class="fa fa-chair fa-3x"></i>
                                                                        <h5 class="text-muted mt-2">
                                                                            {{ $table->name }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
    
                                                        @foreach ($servents as $servent)
                                                        @if ($servent->id == $sale->servant_id)
                                                    
                                                        {{ $servent->name }}
                                                        @endif
                                                     @endforeach
                                                    </td>
                                                    <td>
                                                        {{ $sale->quantity}}
                                                    </td>
                                                    <td>
                                                        {{ $sale->total_received}}
                                                    </td>
                                                    <td>
                                                        {{ $sale->payment_type === "cash" ? "Espéce" : "Carte bancaire"}}
                                                    </td>
                                                    <td>
                                                        {{ $sale->payment_status === "paid" ? "Payé" : "Impayé"}}
                                                    </td>
                                                    <td class="d-flex flex-row justify-content-center align-items-center">
                                                        <a href="{{ url('sales/edit/'.$sale->id) }}" class="btn btn-warning mr-1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
    
                                                 
    
                                                        <form id="{{ $sale->id }}" action="{{ url('delete/sale/'.$sale->id) }}" method="post">
                                                            @csrf
                                                            @method("DELETE")
    
                                                            <button
                                                                onclick="
                                                                    event.preventDefault();
                                                                    if(confirm('Voulez vous supprimer la vente {{ $sale->id }} ?'))
                                                                    document.getElementById({{ $sale->id }}).submit()
                                                                "
                                                                class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="my-3 d-flex justify-content-center align-items-center">
                                        {{ $sales->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection





















