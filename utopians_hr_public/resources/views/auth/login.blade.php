@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center">
		<div style="text-align:center;padding:0px 10px 20px 10px;">
			<img src="{{asset('logo.png')}}" style="width:15%;">
		</div>
        <div class="col-md-8">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
				@csrf
						<span class="login100-form-title p-b-43">
							{{ __(' UTOPIANS - HR Management System ') }} <br>
						</span>
						
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						
						<div class="wrap-input100 rs1">
							<input id="email" class="input100" type="email" name="email" placeholder="E-Mail Address">
						</div>
						
						
						<div class="wrap-input100 rs2">
							<input id="password" class="input100" type="password" name="password" placeholder="Password">
						</div>

						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn">
								Sign in
							</button>
						</div>
				</form>
			</div>
    </div>
	<div class="rights login100-form-title p-b-43"> <p>All rights reserved <a href="https://www.utopians-edu.org/" target="_blank">Utopians</a>  <span class="reg">&reg;</span></p> </div>
</div>

@endsection
