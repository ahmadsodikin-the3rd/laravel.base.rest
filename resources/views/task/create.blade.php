@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">{{ __('Create My Task') }}</div>

	<div class="card-body">
		<form method="POST" action="{{ route('task.store') }}">
			@csrf
			
			@if($errors->any())
				<div class="alert alert-danger">
					<ul class="mb-0">
					@foreach($errors->all() as $message) 
						<li> {{ $message }}</li>
					@endforeach
					</ul>
				</div>
			@endif

			<div class="form-group row">
				<label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Task Name') }} <b class="text-danger">*</b></label>
				<div class="col-md-9">
					<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="start" class="col-md-3 col-form-label text-md-right">{{ __('Start Date') }} <b class="text-danger">*</b></label>
				<div class="col-md-3">
					<input id="start" type="date" class="form-control" name="start" value="{{ old('start') }}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="due" class="col-md-3 col-form-label text-md-right">{{ __('Due Date') }}</label>
				<div class="col-md-3">
					<input id="due" type="date" class="form-control" name="due" value="{{ old('due') }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="end" class="col-md-3 col-form-label text-md-right">{{ __('End Date') }}</label>
				<div class="col-md-3">
					<input id="end" type="date" class="form-control" name="end" value="{{ old('end') }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
				<div class="col-md-9">
					<textarea id="description" class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
				</div>
			</div>
			

			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Create My Task') }}
					</button>
					
					<a href="{{route('task.index')}}" class="btn btn-warning">
						{{ __('Cancel') }}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
