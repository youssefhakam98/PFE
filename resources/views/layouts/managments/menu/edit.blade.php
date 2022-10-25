@extends('layouts.app')

@section('content')
<div class="py-12">

    <div class="content-body">

        <div class="py-12">



            <div class="container">
                <div class="row">




                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"> <strong>Edit Menu {{ $menus->title }}</strong> </div>
                            <form action="{{ url('menu/update/'.$menus->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Menu Name</label>
                                        <input type="text" name="title" rows="5" cols="30" class="form-control"
                                            id="" value="{{$menus->title}}">
                                        @error('menus_name')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">description</label>
                                        <input name="description" class="form-control" id="exampleInputEmail1"
                                            value="{{$menus->description}}"></input>
                                        @error('menus_name')
                                        <span class="text-danger">{{$message}} </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="number" name="price" class="form-control"
                                            value="{{$menus->price}}" placeholder="price">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                .00
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-2">
                                        <input type="hidden" name="old_image" value="{{ $menus->image }}">
                                        <img src="{{ asset($menus->image) }}" widht="200" height="200"
                                            class="img-fluid" alt="{{ $menus->title }}">
                                    </div>

                                    <div class="input-group mb-3">
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
                                    </div>

                                    <div class="form-group">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected disabled> Choisier une category </option>
                                            @foreach ($categories as $categorie)
                                            <option {{ $categorie->id === $menus->category->id ? "selected" : "" }}
                                                value="{{ $categorie->id }}">
                                                {{ $categorie->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Menus</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>






    </div>
</div>
@endsection
   
