@extends('layouts.app')

@section('content')


<div class="py-12">



    <div class="container">
        
        <form class="d-flex justify-content-center" method="get" action="{{url('/search')}}">
            <div class="input-group mb-3 col-md-6">
                <input type="text" class="form-control mb-6" placeholder="Search" name="qurey" >
                <button class="btn btn-outline-secondary" type="submit" >Search</button>
              </div>
        </form>
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
                                        <i class="fas fa-th-list"></i> All Category
                                    </h3>
                                    <a href="{{ url("create/category") }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
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
                                        @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                    <tr>

                                        <th scope="row" id="sid{{ $category->id }}">
                                            {{-- <th scope="row">{{ $category->id }} </th> --}}

                                        <td> {{ $category->title }} </td>


                                        <td>
                                            <a href=" {{ url('category/edit/'.$category->id) }} "
                                                class="btn btn-info">Edit</a>
                                            {{-- <a href=" {{ url('delete/category/'.$category->id) }} "
                                            class="btn btn-danger">

                                            Delete</a> --}}
                                            <a href="javascript:void(0)" class="btn btn-danger"
                                                onclick="Delete({{$category->id}})"> Delete</a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                        </td>
                                        </th>
                                    </tr>
                                        @endforeach
                                        @else
                                            <div class="text-center" >
                                                <h2 style="font-size:20px;color:blue" >No posts found</h2>
                                            </div>
                                        @endif

                                    </tbody>
                                </table>


                                {{-- <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $categories->links('pagination::bootstrap-4') }}
                                </div> --}}


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>





    </div>
</div>

{{-- <script>
$("#categories").submit(function(e){
e.preventdefault();

let category_name = $('#category_name').val();

$.ajax({
url: "{{route('store.category') }}",
type:"POST",
data:{
category_name:category_name
},
success:function(response)
{
if(response)
{
$("#catego_tab tbody").prepend('<tr>
    <td>'+response.category_name+'</td>
</tr>');
$("#categories")[0].reset();
}
}
})
})
</script> --}}

<script>
    function Delete(id){
if(confirm("Do You Want Deeleted"))
{

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
url:'/delete/category/'+id,
type:'DELETE',
data:{
_token : $("input[name=_token]").val()
},
success:function(response)
{
$("#sid"+id).remove();
}
})

}
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



@endsection