@extends('layouts.app')

@section('content')
    

<div class="content-body">
     
        

    <div class="container">
        <form id="add-sale" action="{{ route("sales.store") }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="/home" class="btn btn-outline-secondary">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-2 col-md-3">
                            <h3 class="text-muted border-bottom">
                                {{ Carbon\Carbon::now() }}
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="{{url("payment/index") }}" class="btn btn-outline-secondary float-right">
                                    Toutes les ventes
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($tables as $table)
                                <div class="col-md-3">
                                    <div class="card p-2 mb-2 d-flex
                                                        flex-column justify-content-center
                                                        align-items-center
                                                        list-group-item-action">
                                        <div class="align-self-end">
                                            <input type="checkbox" name="table_id[]" id="table" value="{{ $table->id }}">
                                        </div>
                                        <i class="fa fa-chair fa-5x"></i>
                                        <span class="mt-2 text-muted font-weight-bold">
                                            {{ $table->name }}
                                        </span>
                                        <div class="d-flex
                                                        flex-column justify-content-between
                                                        align-items-center">
                                            <a href="{{ url('table/edit/'.$table->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-12 card p-3">
    
                    <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                        @foreach ($categories as $category)
                        <li class="nav-item" role="presentation">
                            <a href="#{{ $category->title }}"
                                class="nav-link mr-1 {{ $category->title === "Break F" ? "active" : "" }}"
                                id="{{ $category->id }}-tab" data-toggle="tab" role="tab"
                                aria-controls="{{ $category->id }}" aria-selected="true">
                                {{ $category->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
    
                    <div class="tab-content" id="myTabContent">
                        @foreach ($categories as $category)
                        <div class="tab-pane fade {{ $category->title === "dinner" ? "show active" : "" }}"
                            id="{{ $category->title }}" role="tabpanel" aria-labelledby="{{$category->id}}-tab">
                          
                            
                            <div class="row">
                                @foreach($category->menus as $menu)
                               
                                <div class="col-md-4 mb-2">
                                    <div class="card h-100">
                                        <div class="card-body d-flex
                                                    flex-column justify-content-center
                                                    align-items-center">
                                            <div class="align-self-end">
                                                <input type="checkbox" name="menu_id[]" id="menu_id"
                                                    value="{{ $menu->id }}">
                                            </div>
                                            <img src="{{ asset($menu->image) }}" alt="{{ $menu->title }}"
                                                class="fluid rounded-circle"
                                                style=" width:100px; height:100px; object-fit:cover ">
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
                            </div>
    
    
    
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <select name="servant_id" class="form-control">
                                    <option value="" selected disabled>
                                        Sérveur
                                    </option>
                                    @foreach ($servents as $servant)
                                    <option value="{{ $servant->id }}">
                                        {{ $servant->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Qté
                                    </div>
                                </div>
                                <input type="number" name="quantity" class="form-control" placeholder="Qté">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number" name="total_price" class="form-control" placeholder="Prix">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .00
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number" name="total_received" class="form-control" placeholder="Total">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .00
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number" name="change" class="form-control" placeholder="Reste">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .00
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="payment_type" class="form-control">
                                    <option value="" selected disabled>
                                        Type de paiement
                                    </option>
                                    <option value="cash">
                                        Espéce
                                    </option>
                                    <option value="card">
                                        Carte bancaire
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="payment_status" class="form-control">
                                    <option value="" selected disabled>
                                        Etat de paiement
                                    </option>
                                    <option value="paid">
                                        Payé
                                    </option>
                                    <option value="unpaid">
                                        Impayé
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Valider
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
           
    
    
        </div>
@endsection