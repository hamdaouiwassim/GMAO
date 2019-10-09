@extends('layouts.app')

@section('content')
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><h1>TAVGMAO</h1></div>
								<p class="lead">Connecter aux dashboard
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
								
								</p>
							</div>
							<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" name="email" value="{{ old('email') }}" class="form-control" id="signin-email"  placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Mot de passe</label>
									<input type="password" name="password" class="form-control" id="signin-password"  placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
										<span>Garder ma sesion active</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Connecter</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Mot de passe oublié?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right" style="background-image:url('{{ asset('img/login-bg.jpg') }}') !important">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Systeme de gestion de maintenance assité par ordinateur</h1>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->





@endsection
