@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-4">

            @include('layouts.sidebar')

        </div>


        <div class="col-md-8">
            <div class="card">
                <h3><i class="fas fa-plus fa-x2" ></i> Add Category </h3>
                <form action="{{ route('store.category') }}" id="categories" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            {{-- @error('category_name')
                            <span class="text-danger">{{$message}} </span>
                            @enderror --}}
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>

        </div>
    </div>
</div>



@endsection