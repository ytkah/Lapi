@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-default">
				<div class="card-header">List of Items</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Price</th>
								<th>Img</th>
								<th>description</th>
								<th>Created At</th>
								<th>Update At</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($items as $item)
								<tr>
									<td>{{$item->id}}</td>
									<td>{{$item->name}}</td>
									<td>{{$item->price}}</td>
									<td>{{$item->img}}</td>
									<td>{{$item->description}}</td>
									<td>{{$item->created_at}}</td>
									<td>{{$item->updated_at}}</td>
									<td>
										<a style="float: left;" class="btn btn-primary" href="{{route('items.show', $item->id)}}">view</a>
										<form style="float: left;" method="POST" action="{{route('items.update', $item->id)}}" aria-label="Register">
	                                        @csrf
	                                        <input type="hidden" name="_method" value="DELETE">
	                                        <input type="submit"  class="btn btn-danger" value="DELETE">
	                                    </form>
									</td>
								</tr>
							@endforeach
						</tbody>						
					</table>
					<div class="text-center">{{$items->links()}}</div>					
					<a class="btn btn-primary" href="{{route('items.create')}}">Create New Item</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection