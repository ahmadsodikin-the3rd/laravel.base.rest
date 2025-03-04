@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Login') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('auth.login.submit') }}">
						@csrf
						
						@if($errors->any())
							<div class="alert alert-danger">
								{{ implode('<br>', $errors->all()) }}
							</div>
						@endif

						<div class="form-group row">
							<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

							<div class="col-md-6">
								<input id="username" type="text" class="form-control" name="username" value="{{ old('username') ?: 'admin' }}" required autocomplete="username" autofocus>
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" required value="admin12345">
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
