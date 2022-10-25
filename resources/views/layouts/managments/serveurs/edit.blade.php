@extends('layouts.app')

@section('content')
    
<div class="py-12">









    <div class="content-body">
       
            <div class="container">
                <div class="row">
        
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header"> Edit Servants {{ $servents->name}} </div>
                            <form action=" {{ url('servant/update/'.$servents->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Update Servants Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $servents->name}}">
                                        @error('table_name')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
        
                                    </div>
        
                                    @if ($servents->address)
        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Update address</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $servents->address}}">
                                        @error('address_name')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
        
                                    </div>
        
                                    @else
        
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Update address</label>
                                        <input type="text" name="address" class="form-control text-danger" id="Key"
                                            aria-describedby="emailHelp" value="{{ !$servents->address ? "Address non Disponible" : ""}}">
                                        @error('address_name')
                                        <span class="text-danger">{{ $message }} </span>
                                        @enderror
        
                                    </div>
                                    
                                    @endif
                                  
                                    <button type="submit" class="btn btn-primary">Update Servants</button>
                            </form>
                        </div>
        
                    </div>
                </div>
            </div>
       
        
        

       
    </div>







</div>
@endsection