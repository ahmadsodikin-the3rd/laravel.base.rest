@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">{{ __('Create User') }}</div>

	<div class="card-body">
		<form method="POST" action="{{ route('user.store') }}">
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
				<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }} <b class="text-danger">*</b></label>

				<div class="col-md-6">
					<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} <b class="text-danger">*</b></label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} <b class="text-danger">*</b></label>
				<div class="col-md-6">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <b class="text-danger">*</b></label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
				</div>
			</div>

			<div class="form-group row">
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} <b class="text-danger">*</b></label>
				<div class="col-md-6">
					<input id="password-confirm" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
				</div>
			</div>
			
			<hr>
			
			<div class="form-group row">
				<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

				<div class="col-md-6">
					<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
				<div class="col-md-6">
					<input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}">
				</div>
			</div>
			
			<hr>
			
			<div class="form-group row">
				<label for="addr_street" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>
				<div class="col-md-6">
					<input id="addr_street" type="text" class="form-control @error('addr_street') is-invalid @enderror" name="addr_street" value="{{ old('addr_street') }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="addr_suite" class="col-md-4 col-form-label text-md-right">{{ __('Suite') }}</label>
				<div class="col-md-6">
					<input id="addr_suite" type="text" class="form-control @error('addr_suite') is-invalid @enderror" name="addr_suite" value="{{ old('addr_suite') }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
				<div class="col-md-6">
					<input id="add_city" type="text" class="form-control @error('add_city') is-invalid @enderror" name="add_city" value="{{ old('add_city') }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

				<div class="col-md-6">
					<input id="add_zip" type="text" class="form-control @error('add_zip') is-invalid @enderror" name="add_zip" value="{{ old('add_zip') }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_geo_lat" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>

				<div class="col-md-6">
					<input id="add_geo_lat" type="text" class="form-control @error('add_geo_lat') is-invalid @enderror" name="add_geo_lat" value="{{ old('add_geo_lat') }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="add_geo_lng" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>

				<div class="col-md-6">
					<input id="add_geo_lng" type="text" class="form-control @error('add_geo_lng') is-invalid @enderror" name="add_geo_lng" value="{{ old('add_geo_lng') }}">
				</div>
			</div>

			<hr>
			
			

			<div class="form-group row">
				<label for="cpn_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

				<div class="col-md-6">
					<input id="cpn_name" type="text" class="form-control @error('cpn_name') is-invalid @enderror" name="cpn_name" value="{{ old('cpn_name') }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="cpn_phrase" class="col-md-4 col-form-label text-md-right">{{ __('Company Phrase') }}</label>

				<div class="col-md-6">
					<input id="cpn_phrase" type="text" class="form-control @error('cpn_phrase') is-invalid @enderror" name="cpn_phrase" value="{{ old('cpn_phrase') }}">
				</div>
			</div>


			<div class="form-group row">
				<label for="cpn_bs" class="col-md-4 col-form-label text-md-right">{{ __('Company Bs') }}</label>

				<div class="col-md-6">
					<input id="cpn_bs" type="text" class="form-control @error('cpn_bs') is-invalid @enderror" name="cpn_bs" value="{{ old('cpn_bs') }}">
				</div>
			</div>


			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Create User') }}
					</button>
					
					<a href="{{route('user.index')}}" class="btn btn-warning">
						{{ __('Cancel') }}
					</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
