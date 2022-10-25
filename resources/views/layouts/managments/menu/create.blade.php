@extends('layouts.app')

@section('content')


    <div class="content-body">
       
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">

                            <h3 class="text-center"> Add Menu </h3>
                            <form action="{{ route('store.menu') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Menu Name</label>
                                        <input type="text" name="title" rows="5" cols="30" class="form-control"
                                            id="description" aria-describedby="emailHelp">
                                        @error('title')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Menu Description</label>
                                        <textarea name="description" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"></textarea>
                                        @error('description')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="number" name="price" class="form-control" placeholder="price">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                .00
                                            </div>
                                        </div>

                                    </div>
                                    @error('price')
                                    <span class="text-danger">{{$message}} </span>
                                    @enderror

                                    {{-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Image
                                        </span>
                                    </div>
        
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label">
                                            2 mg max
                                        </label>
                                    </div>
                                   
                                </div> --}}



                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    @error('image')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror


                                    {{-- @error('image')
                                <span class="text-danger">{{$message}} </span>
                                    @enderror --}}

                                    <div class="form-group">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="" selected disabled> Choisier une category </option>
                                            @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">
                                                {{ $categorie->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Add menus</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>



    </div>


@endsection


