@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">User</div>

	<div class="card-body">
		@if($errors->any())
			<div class="alert alert-danger">
				{{ implode('<br>',$errors->all()) }}
			</div>
		@endif
		<div class="text-right pb-3">
			<a href="{{route('user.create')}}" class="btn btn-primary">Create</a>
		</div>
		<table class="table table-stripped table-hover table-bordered">
			<thead>
				<tr>
					<th>Username</th>
					<th>Name</th>
					<th>Email</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
			@foreach($data ?? '' as $row)
				<tr>
					<td><a href="{{route('user.show', ['user'=>$row->id])}}">{{$row->username}}</a></td>
					<td>{{$row->name}}</td>
					<td>{{$row->email}}</td>
					<td width="150" class="text-center">
						<form action="{{route('user.destroy', ['user'=>$row->id])}}" method="POST">
							@method('DELETE')
							@csrf
							<a href="{{route('user.edit', ['user'=>$row->id])}}" class="btn btn-sm btn-primary">Edit</a>
							<button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	</div>
</div>

@endsection
