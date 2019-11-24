@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">Task</div>

	<div class="card-body">
		@if($errors->any())
			<div class="alert alert-danger">
				{{ implode('<br>',$errors->all()) }}
			</div>
		@endif
		<div class="text-right pb-3">
			<a href="{{route('task.create')}}" class="btn btn-primary">Create</a>
		</div>
		<table class="table table-stripped table-hover table-bordered">
			<thead>
				<tr>
					<th>Task Name</th>
					<th>Start</th>
					<th>Due</th>
					<th width="150">Option</th>
				</tr>
			</thead>
			<tbody>
			@if(isset($data) && is_array($data)) @foreach($data as $row)
				<tr>
					<td><a href="{{route('task.show', ['task'=>$row->id])}}">{{$row->name}}</a></td>
					<td>{{$row->start ? date('d M Y',strtotime($row->start)) : ''}}</td>
					<td>{{$row->due ? date('d M Y',strtotime($row->due)) : ''}}</td>
					<td class="text-center">
						<form action="{{route('task.destroy', ['task'=>$row->id])}}" method="POST">
							@method('DELETE')
							@csrf
							<a href="{{route('task.edit', ['task'=>$row->id])}}" class="btn btn-sm btn-primary">Edit</a>
							<button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach @endif
			</tbody>
		</table>

	</div>
</div>

@endsection
