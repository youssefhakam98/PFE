@extends('layouts.app')

@section('content')


@if(session('success'))
    <div class="" id="uniqu*" >
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

@endif


@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session('warning') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif




<div class="content-body">

    <div class="row">
        <div class="col-md-8 mx-auto my-4">
            @include('layouts.alert')
        </div>
    </div>



    {{-- <form class="d-flex justify-content-center" method="get" action="{{url('/search')}}"> --}}
    <div class="input-group mb-3 col-md-6 mt-4" style="margin-left: 200px">

        <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search">

        {{-- <input type="text" class="form-control mb-6" placeholder="Search" name="search" id="search" >
                    <button class="btn btn-outline-secondary" type="submit" >Search</button> --}}
    </div>
    {{-- </form> --}}
    <div id="search_list"></div>    

    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            <div
                                class="d-flex flex-row justify-content-between align-items-center border-bottom pd-1">
                                <h3 class="text-secondry" id="total_records">
                                    <i class="fa fa-th-list"></i> All Category
                                </h3>
                            </div>


                            <table class="table" id="catego_tab">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Title</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1)  --}}


                                    @foreach ($categories as $category)
                                    <tr>
                                        <input type="hidden" class="delete_val" value="{{ $category->id }}">
                                        <th scope="row">{{ $category->id }} </th>
                                        {{-- <th scope="row">{{ $category->id }} </th> --}}

                                        <td> {{ $category->title }} </td>


                                        <td>
                                            <a href=" {{ url('category/edit/'.$category->id) }} "
                                                class="btn btn-info">Edit</a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <button href="{{ url('delete/category/'.$category->id) }}"
                                                class="serviceDelete btn btn-danger">Delete</button>


                                        </td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>




                            <div class="my-3 d-flex justify-content-center align-items-center">

                                {{ $categories->links('pagination::bootstrap-4') }}
                            </div>


                        </div>


                        <div class="col-md-4 mt-8">
                            <div class="">
                                <div class="card-header">
                                    <h4 class="card-title">Add Categoreis</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ route('store.category') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="category_name" id="category_name"
                                                    class="form-control input-default " placeholder="Add Category">
                                            </div>
                                            <button type="submit" class="btn btn-rounded btn-info"><span
                                                    class="yourStory btn-icon-left text-info"><i
                                                        class="fa fa-plus color-info"></i>
                                                </span>Add Category</button>
                                        </form>
                                    </div>
                                </div>
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

        $('#search').on('keyup',function(){

        $value=$(this).val();

        $.ajax({

            type : 'GET',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){

            $('tbody').html(data);

            }
        });

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

                var data = {
                    "_token" : $('input[name="csrf-token"]').val(),
                    "id" : delete_id,
                }


                $.ajax({
                    type:"DELETE",
                    url:'delete/category/'+delete_id,
                    data:data,
                    success: function (response){
                        swal(response.warning, {
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


