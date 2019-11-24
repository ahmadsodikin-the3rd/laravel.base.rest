@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">{{ __('Detail Task') }}</div>

	<div class="card-body">
		<form method="POST" action="">
			
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
					<input id="name" type="text" readonly class="form-control-plaintext" name="name" value="{{ $data->name }}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="start" class="col-md-3 col-form-label text-md-right">{{ __('Start Date') }} <b class="text-danger">*</b></label>
				<div class="col-md-3">
					<input id="start" type="date" readonly class="form-control-plaintext" name="start" value="{{ date('Y-m-d', strtotime($data->start)) }}" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="due" class="col-md-3 col-form-label text-md-right">{{ __('Due Date') }}</label>
				<div class="col-md-3">
					<input id="due" type="date" readonly class="form-control-plaintext" name="due" value="{{ $data->due ? date('Y-m-d', strtotime($data->due)) : '' }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="end" class="col-md-3 col-form-label text-md-right">{{ __('End Date') }}</label>
				<div class="col-md-3">
					<input id="end" type="date" readonly class="form-control-plaintext" name="end" value="{{ $data->end ? date('Y-m-d', strtotime($data->end)) : '' }}">
				</div>
			</div>
			<div class="form-group row">
				<label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
				<div class="col-md-9">
					<textarea id="description" readonly class="form-control-plaintext" rows="5" name="description">{{ $data->description }}</textarea>
				</div>
			</div>
			

			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<a href="{{route('task.index')}}" class="btn btn-primary">
						{{ __('Back') }}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
