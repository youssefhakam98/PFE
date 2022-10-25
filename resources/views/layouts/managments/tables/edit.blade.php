@extends('layouts.app')

@section('content')
    
<div class="py-12">









    <div class="content-body">
        

        <div class="container">
            <div class="row">



                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> Edit Table {{$tables->name}} </div>
                        <form action=" {{ url('table/update/'.$tables->id) }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $tables->name}}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }} </span>
                                    @enderror

                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-select" name="status" class="form-control">
                                            <option value="" disabled>Disponible</option>
                                            <option {{ $tables->status === 1 ? "selected" : "" }} value="1">yes
                                            </option>
                                            <option {{ $tables->status === 0 ? "selected" : "" }} value="0">No
                                            </option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Table</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>







</div>
@endsection