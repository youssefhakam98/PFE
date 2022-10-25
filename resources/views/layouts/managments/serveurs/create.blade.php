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

    


<div class="container">


<div class="row">



    <div class="col-md-10">
        <div class="card">
            <div class="card-header"> Add Servants </div>
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
@endsection
