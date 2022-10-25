@extends('layouts.app')

@section('content')



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>



<div class="content-body">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto my-4">
                @include('layouts.alert')
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reservation Client</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>outil</th>
                                    {{-- <th>Phone</th> --}}
                                    {{-- <th>Date</th> --}}
                                    {{-- <th>Message</th> --}}
                                    {{-- <th>Nb</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservation as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>
                                        <a href="#" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="far fa-eye"></i>
                                            {{-- <i class="fa fa-bell" style="color: #0d6efd"></i> --}}
                                        </a>
                                        <a href="{{url('softDelete/reservation/'.$data->id) }}" type="button">
                                            <i class="fas fa-check-circle" style="color: green"></i>
                                            {{-- <i class="fa fa-bell" style="color: #0d6efd"></i> --}}
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog  modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{$data->name}}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-phone"></i></span>
                                                            <input type="text" class="form-control"
                                                                value="{{$data->phone}}">
                                                        </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-phone"></i></span>
                                                            <input type="text" class="form-control"
                                                                value="{{$data->date}}">
                                                        </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-phone"></i></span>
                                                            <input type="text" class="form-control"
                                                                value="{{$data->gest}}">
                                                        </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-comment"></i></span>
                                                            <input type="text" class="form-control"
                                                                value="{{$data->message}}">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>{{$data->phone}}</td> --}}
                                    {{-- <td>{{$data->date}}</td> --}}
                                    {{-- <td>{{$data->message}}</td> --}}
                                    {{-- <td><strong>{{$data->gest}}</strong></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            {{-- start sefteDeleted --}}






        </div>
    </div>


</div>






@endsection