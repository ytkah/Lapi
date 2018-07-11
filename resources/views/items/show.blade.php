@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Item:{{$item->id}}</div>
                    <div class="card-body">
                        <div class="col-md-8" style="float: left;">
                            <div class="form-group row">                                
                                <img src="{{ asset($item->img)}}" style="max-width:560px;">                                
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 text-md-right" >ID:</label>
                                <div class="col-md-6">{{$item->id}}</div>
                            </div>  
                            <div class="form-group row">  
                                <label class="col-md-2 text-md-right">Name:</label>
                                <div class="col-md-6">{{$item->name}}</div>
                            </div>  
                            <div class="form-group row">  
                                <label class="col-md-2 text-md-right">Price:</label>
                                <div class="col-md-6">{{$item->price}}</div>
                            </div>  
                            <div class="form-group row">  
                                <label class="col-md-2 text-md-right">Description:</label>
                                <div class="col-md-6">{{$item->description}}</div>
                            </div>                            
                        </div>
                        <div class="col-md-4" style="float: left;">
                            <dl class="well">
                                <label>Created At:</label>
                                <div>{{$item->created_at}}</div>
                                <label>Updated At:</label>
                                <div>{{$item->updated_at}}</div>
                            </dl>
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-primary" href="{{route('items.edit', $item->id)}}">edit</a>
                                </div>
                                <div class="col-md-6">
                                    <form method="POST" action="{{route('items.update', $item->id)}}" aria-label="Register">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit"  class="btn btn-danger" value="DELETE">
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>                    
            </div>  
        </div>  
    </div>  
@endsection