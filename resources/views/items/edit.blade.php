@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
    	<strong>Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card card-default">
					<div class="card-header">Edit Item</div>
					<div class="card-body">
						<form method="POST" action="{{route('items.update', $item->id)}}" aria-label="Register" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="_method" value="PUT">
							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
								<div class="col-md-6">
									<input id="name" type="text" name="name" value="{{ $item->name }}" required="required" autofocus="autofocus" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">Price</label>
								<div class="col-md-6">
									<input id="email" type="text" name="price" value="{{ $item->price }}" required="required" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Img</label>
								<div class="col-md-6">
									<input type="file" name="img" >
									<img src="{{ asset($item->img)}}" height="50">
								</div>
							</div>
							<div class="form-group row">
								<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Description</label>
								<div class="col-md-6">
									<input id="password-confirm" type="text" name="description" required="required" class="form-control" value="{{ $item->description }}">
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
@endsection