@extends('layouts.app')


@section("content")

<div class="content-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div
                                    class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fa fa-list text-success"></i> Rapports
                                    </h3>
                                    <a href="/home" class="btn btn-outline-secondary">
                                        <i class="fa fa-chevron-left fa-x2"></i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 shadow mx-auto p-2">
                                            <form action="{{ route("reports.generate") }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="date" name="from" placeholder="Date Début"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" name="to" placeholder="Date Fin"
                                                        class="form-control">
                                                </div>
                                                <div class="text-center form-group">
                                                    <button class="btn btn-primary">
                                                        Afficher le rapport
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @isset($total)
                                <h4 class="text-center text-primary mt-4 mb-2 font-weight-bold">
                                    Rapport de <strong>{{$startDate}}</strong> à <strong>{{ $endDate }}</strong>
                                </h4>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Menus</th>
                                            <th>Prix</th>
                                            <th>Tables</th>
                                            <th>Sérveur</th>
                                            <th>Quantité</th>
                                            <th>Total</th>
                                            <th>Type de paiement</th>
                                            <th>Etat de paiement</th>
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
                                                            <h5 class="font-weight-bold mt-2">
                                                                {{ $menu->title }}
                                                            </h5>

                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <h5 class="text-muted">
                                                    {{ $menu->price }} DH
                                                </h5>
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>





                                <p class="text-danger text-center font-weight-bold">
                                    <span class="border border-danger p-2">
                                        Total : {{ $total }} DH
                                    </span>
                                </p>

                                <form action="{{route("reports.export")}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="from" value="{{ $startDate }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="to" value="{{$endDate }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger">
                                            Génerer le rapport excel
                                        </button>
                                    </div>
                                </form>

                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection