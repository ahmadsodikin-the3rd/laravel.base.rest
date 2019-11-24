@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">{{ __('Detail User') }}</div>

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
				<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }} <b class="text-danger">*</b></label>
				<div class="col-md-6">
					<input id="username" type="text" readonly class="form-control-plaintext" name="username" value="{{ $data->username }}" required >
				</div>
			</div>
			
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <b class="text-danger">*</b></label>
				<div class="col-md-6">
					<input id="name" type="text" readonly class="form-control-plaintext" name="name" value="{{ $data->name }}" required autocomplete="name">
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <b class="text-danger">*</b></label>
				<div class="col-md-6">
					<input id="email" type="email" readonly class="form-control-plaintext" name="email" value="{{ $data->email }}" required autocomplete="email">
				</div>
			</div>

			<hr>
			
			<div class="form-group row">
				<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

				<div class="col-md-6">
					<input id="phone" type="text" readonly class="form-control-plaintext" name="phone" value="{{ $data->phone }}">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
				<div class="col-md-6">
					<input id="website" type="text" readonly class="form-control-plaintext" name="website" value="{{ $data->website }}">
				</div>
			</div>
			
			<hr>
			
			<div class="form-group row">
				<label for="addr_street" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>
				<div class="col-md-6">
					<input id="addr_street" type="text" readonly class="form-control-plaintext" name="addr_street" value="{{ $data->addr_street }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="addr_suite" class="col-md-4 col-form-label text-md-right">{{ __('Suite') }}</label>
				<div class="col-md-6">
					<input id="addr_suite" type="text" readonly class="form-control-plaintext" name="addr_suite" value="{{ $data->addr_suite }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
				<div class="col-md-6">
					<input id="add_city" type="text" readonly class="form-control-plaintext" name="add_city" value="{{ $data->add_city }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

				<div class="col-md-6">
					<input id="add_zip" type="text" readonly class="form-control-plaintext" name="add_zip" value="{{ $data->add_zip }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_geo_lat" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>

				<div class="col-md-6">
					<input id="add_geo_lat" type="text" readonly class="form-control-plaintext" name="add_geo_lat" value="{{ $data->add_geo_lat }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_geo_lng" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>

				<div class="col-md-6">
					<input id="add_geo_lng" type="text" readonly class="form-control-plaintext" name="add_geo_lng" value="{{ $data->add_geo_lng }}">
				</div>
			</div>

			<hr>
			
			

			<div class="form-group row">
				<label for="cpn_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

				<div class="col-md-6">
					<input id="cpn_name" type="text" readonly class="form-control-plaintext" name="cpn_name" value="{{ $data->cpn_name }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="cpn_phrase" class="col-md-4 col-form-label text-md-right">{{ __('Company Phrase') }}</label>

				<div class="col-md-6">
					<input id="cpn_phrase" type="text" readonly class="form-control-plaintext" name="cpn_phrase" value="{{ $data->cpn_phrase }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="cpn_bs" class="col-md-4 col-form-label text-md-right">{{ __('Company Bs') }}</label>

				<div class="col-md-6">
					<input id="cpn_bs" type="text" readonly class="form-control-plaintext" name="cpn_bs" value="{{ $data->cpn_bs }}">
				</div>
			</div>


			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<a href="{{route('user.index')}}" class="btn btn-primary">
						{{ __('Back') }}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
