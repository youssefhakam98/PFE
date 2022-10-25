@extends('layouts.app')

@section('content')







<div class="py-12">









    <div class="content-body">
        {{-- <form class="d-flex justify-content-center" method="get" action="{{url('/search')}}"> --}}
        <div class="input-group mb-3 col-md-6">

            <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search">

            {{-- <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search" >
                <button class="btn btn-outline-secondary" type="submit" >Search</button> --}}
        </div>
        {{-- </form> --}}
        <div id="search_list"></div>


        <div class="py-12">

            <div class="container">
                <div class="row">

                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-body">
                                <div
                                    class="d-flex flex-row justify-content-between align-items-center border-bottom pd-1">
                                    <h3 class="text-secondry">
                                        <div class=""> <i class="fas fa-chair"></i> <strong></strong> All Tables </div>

                                    </h3>

                                </div>

                                {{-- message alert  --}}
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
                                            <th scope="col">name</th>
                                            <th scope="col">Disponible</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tables as $table)

                                        <tr>
                                            <input type="hidden" class="delete_val" value="{{ $table->id }}">
                                            <th scope="row">{{ $table->id }} </th>
                                            <td> {{ $table->name }} </td>
                                            <td>

                                                {{-- @if ($table->status)
                                                <span class="badge badge-success">
                                                    oui
                                                </span>
                                                @else
                                                <span class="badge badge-danger">
                                                    No
                                                </span>
                                                @endif --}}
                                            </td>

                                            <td>
                                                <a href=" {{ url('table/edit/'.$table->id) }} "
                                                    class="btn btn-info">Edit</a>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                                <button href="{{ url('delete/table/'.$table->id) }}"
                                                    class="serviceDelete btn btn-danger">Delxete</button>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $tables->links('pagination::bootstrap-4') }}

                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-header"> Add Table </div>
                            <form action="{{ route('store.table') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Table Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        @error('name')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror

                                    </div>

                                    {{-- <div class="form-group">
                                        <select class="form-select" name="status" class="form-control">
                                            <option value="" selected disabled>Disponible</option>
                                            <option value="1">yes</option>
                                            <option value="0">No</option>
                                        </select>   
                                    </div> --}}



                                    <input class="toggle-class" type="checkbox" data-onstyle="success"
                                        data-offstyle="danger" data-toggle="toggle" data-on="Oui" data-off="Non"
                                        name="status">



                                    <div class="my-3 d-flex justify-content-center align-items-center">

                                        <button type="submit" class="btn btn-rounded btn-info">
                                            <span class="btn-icon-left text-info">
                                                <i class="fa fa-plus color-light"></i>
                                            </span> Add Table
                                        </button>
                                    </div>

                            </form>
                        </div>

                    </div>


                </div>


            </div>
        </div>







    </div>
</div>


<script>
    $(document).ready(function(){
        $("#member_table").DataTable()
    });
    $(function(){
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var member_id = $(this).data('id');
               $.ajax({
                   type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {'status': status, 'member_id': member_id},
                    success: function(data){
                        console.log('Success');
                    }
               })
        })
    })

</script>



<script type="application/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(".serviceDelete").click(function(e){
   
        e.preventDefault();
        
        var delete_id = $(this).closest("tr").find('.delete_val').val()
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

                var dataT = {
                    "_token" : $('input[name="csrf-token"]').val(),
                    "id" : delete_id,
                }


                $.ajax({
                    type:"DELETE",
                    url:'/delete/table/'+delete_id,
                    data:dataT,
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