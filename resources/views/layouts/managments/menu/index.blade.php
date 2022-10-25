@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="py-12">

    <div class="content-body">

        <div class="row">
            <div class="col-md-8 mx-auto my-4">
                @include('layouts.alert')
            </div>
        </div>


        {{-- <form class="d-flex justify-content-center" method="get" action="{{url('/search')}}"> --}}
        <div class="input-group mb-3 col-md-6 mt-3" style="margin-left: 240px">

            <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search">

            {{-- <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search" >
                    <button class="btn btn-outline-secondary" type="submit" >Search</button> --}}
        </div>
        {{-- </form> --}}
        <div id="search_list"></div>


        <div class="container">


            <div class="">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom pd-1">
                                <h3 class="text-secondry">
                                    <i class="fas fa-clipboard-list"></i> <strong>All Menu</strong>
                                </h3>

                                <div class="d-flex flex-row justify-content-between align-items-center mb-3"
                                    style="margin-right: 60px;">
                                    <a href="{{ url("create/menu") }}" type="submit" class="btn btn-rounded btn-info">
                                        <span class="btn-icon-left text-info">
                                            <i class="fa fa-plus color-light"></i>
                                        </span>Add Menu
                                    </a>
                                </div>

                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"> <strong>id</strong> </th>
                                        <th scope="col"> <strong>Title</strong> </th>
                                        <th scope="col"> <strong>Description</strong> </th>
                                        <th scope="col"> <strong>Price</strong> </th>
                                        <th scope="col"> <strong>Catégory</strong> </th>
                                        <th scope="col"> <strong>Image</strong> </th>
                                        <th scope="col"> <strong>Action</strong> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1)  --}}
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <input type="hidden" class="delete_val" value="{{ $menu->id }}">

                                        <th scope="row"> {{ $menu->id }} </th>
                                        <td> {{ $menu->title }} </td>
                                        <td> {{ substr($menu->description,0,100) }} </td>
                                        <td> {{ $menu->price }}DH </td>
                                        <td> {{ $menu->category->title }} </td>
                                        <td> <img src="{{ asset($menu->image) }}" alt="{{ $menu->title }}"
                                                class="fluid rounded"
                                                style=" width:100px; height:100px; object-fit:cover ">
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('menu/edit/'.$menu->id)}}"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <button href="{{url('delete/menu/'.$menu->id)}}"
                                                    class="serviceDelete btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>







                            <div class="my-3 d-flex justify-content-center align-items-center">

                                {{ $menus->links('pagination::bootstrap-4') }}
                            </div>


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

                var data = {
                    "_token" : $('input[name="csrf-token"]').val(),
                    "id" : delete_id,
                }


                $.ajax({
                    type:"DELETE",
                    url:'/delete/menu/'+delete_id,
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