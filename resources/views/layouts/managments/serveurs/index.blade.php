@extends('layouts.app')

@section('content')
<div class="content-body">
    {{-- <form class="d-flex justify-content-center" method="get" action="{{url('/search')}}"> --}}
    <div class="input-group mb-3 col-md-6 mt-4" style="margin-left: 200px">

        <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search">

        {{-- <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search" >
            <button class="btn btn-outline-secondary" type="submit" >Search</button> --}}
    </div>
    {{-- </form> --}}
    <div id="search_list"></div>





    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">


                        <div class="d-flex flex-row justify-content-between align-items-center border-bottom pd-1">
                            <h3 class="text-secondry">
                                <i class="fas fa-user-cog"></i> <strong>All Serveurs</strong>
                            </h3>

                            <div class="d-flex flex-row justify-content-between align-items-center mb-3"
                                style="margin-right: 60px;">
                                <a href="{{ url("create/servant") }}" type="submit" class="btn btn-rounded btn-info">
                                    <span class="btn-icon-left text-info">
                                        <i class="fa fa-plus color-light"></i>
                                    </span>Add Serveurs
                                </a>
                            </div>

                        </div>


                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Name & Prénom </th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($servents as $servent)

                                <tr>
                                    <input type="hidden" class="deleteVal" value="{{ $servent->id }}">
                                    <th scope="row">{{ $servent->id }} </th>
                                    <td> {{ $servent->name }} </td>
                                    <td>
                                        @if ($servent->address)
                                        {{ $servent->address }}
                                        @else
                                        <span class="text-danger">
                                            Non Disponble
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href=" {{ url('servant/edit/'.$servent->id) }} "
                                            class="btn btn-info">Edit</a>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button href=" {{ url('delete/servant/'.$servent->id) }} "
                                            class="serviceDelete  btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="my-3 d-flex justify-content-center align-items-center">
                            {{ $servents->links('pagination::bootstrap-4') }}

                        </div>


                    </div>
                </div>


            </div>

            <div class="col-md-4 mt-8">
                <div class="">
                    <div class="card-header">
                        <h4 class="card-title">Add Servants</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('store.servant') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Servants Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        {{-- @error('name')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror --}}
                
                                    </div>
                
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Servants Address</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        @error('address')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                
                                    </div>
                
                                    <div class="my-3 d-flex justify-content-center align-items-center">
                
                                        <button type="submit" class="btn btn-primary">Add Sevants</button>
                                    </div>
                
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>


<script type="application/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(".serviceDelete").click(function(e){
   
        e.preventDefault();
        
        var delete_id = $(this).closest("tr").find('.deleteVal').val()
        // alert(delete_id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var data = {
                    "_token" : $('input[name="csrf-token"]').val(),
                    "id" : delete_id,
                }


                $.ajax({
                    type:"DELETE",
                    url:'/delete/servant/'+delete_id,
                    data:data,
                    success: function (response){
                        swal(response.status, {
                            icon: "success",
                        })
                        .then((result) =>{
                            location.reload();
                        })
                    }
                })



               
            } else {
                swal("Your imaginary file is safe!");
            }
        });

   
});


    })

</script>



@endsection