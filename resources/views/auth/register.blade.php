@extends('layouts.app')

@section('headscripts')
{!! NoCaptcha::renderJs('es') !!}
@endsection

@section('content')
<div class="container push-to-header">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8">
			<div class="text-center">
				<img src="{{asset(app_setting('app_logo_white','img/default-logo-white.svg'))}}" class="img-fluid logo-home-smaller mb-5 mt-2"
					alt="{{ config('app.name', 'Laravel') }}">
			</div>

      {{--
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul class="mb-0">
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="card shadow-sm py-4">
				<div class="card-body">
					<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
									value="{{ old('name') }}" required>
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

							<div class="col-md-6">
								<input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
									name="surname" value="{{ old('surname') }}" required>

								@error('surname')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
									value="{{ old('email') }}" required>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="organization" class="col-md-4 col-form-label text-md-right">Organización</label>

							<div class="col-md-6">
								<input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror"
									name="organization" value="{{ old('organization') }}" maxlength="550">
								<small class="form-text text-muted"><span class="text-info">(Opcional)</span> Si desea, puede escribir a que organización pertenece</small>


								@error('organization')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
									name="password" required>
								<small class="form-text text-muted">La contraseña debe tener al menos <span class="text-info">8 caracteres</span></small>

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm"
								class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Complete el desafio</label>

							<div class="col-md-6">
								{!! NoCaptcha::display(['data-theme' => 'light']) !!}
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<p class="text-smaller is-400">Al registrarse, usted da conformidad con los <a href="{{route('about.legal')}}">Términos y condiciones</a> del portal</p>
								<button type="submit" class="btn btn-primary">
									<i class="fas fa-paper-plane"></i>&nbsp;{{ __('Register') }}
								</button>
								<a href="{{route('home')}}" class="btn btn-outline-white btn-sm">
									<i class="fas fa-home"></i> Volver al inicio
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			--}}
		</div>
	</div>

  <div>
    <p class="alert text-center is-300 is-size-5">
      Acceso disponible unicamente para Ciudadanos de San Benito.
    </p>
  </div>
</div>
@endsection
