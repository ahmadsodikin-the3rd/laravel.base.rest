@extends('layouts.app')

@section('content')

@guest
<div class="container">
@endguest

<div class="card">
	<div class="card-header">{{ __('API Documentaries') }}</div>

	<div class="card-body">
	@foreach($routes as $group=>$route)
		<h1>{{$group}} </h1>
		@foreach($route as $api)
			@php
				$api_arr = explode('|', $api);
			@endphp
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th class="p-2" colspan="2">{{$api_arr[0]}}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th class="p-2" width="15%">URL</th>
						<td class="p-2">{{url('/api'.$api_arr[2])}}</td>
					</tr>
					<tr>
						<th class="p-2">Method</th>
						<td class="p-2">{{strtoupper($api_arr[1])}}</td>
					</tr>
					<tr>
						<th class="p-2">Params</th>
						<td class="p-2">{{isset($api_arr[3]) ? $api_arr[3] : '-' }}</td>
					</tr>
					<tr>
						<th class="p-2">Header</th>
						<td class="p-2">{{isset($api_arr[4]) ? $api_arr[4] : '-' }}</td>
					</tr>
				</tbody>
			</table>

		@endforeach	
		<hr class="mb-5">
	@endforeach	
	</div>
</div>

@guest
</div>
@endguest

@endsection
