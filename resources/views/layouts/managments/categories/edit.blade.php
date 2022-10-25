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

        <div class="row justify-content-center ">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category {{ $categories->title}} </h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control input-default "
                                        value="{{ $categories->title}}" placeholder="Add Category">
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-rounded btn-info"><span
                                        class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>





@endsection