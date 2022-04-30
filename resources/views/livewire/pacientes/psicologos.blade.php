@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('Iniciaste sesión ') }}{{ config('app.name', 'Laravel') }}</h5>
				</br> 
				<hr>
								
			<div class="row w-100">
					<div class="col-md-3">
						<div class="card border-info mx-sm-1 p-3">
							<div class="card border-info text-info p-3" ><span class="text-center fa fa-plane-departure" aria-hidden="true"></span></div>
							<div class="text-info text-center mt-3"><h4>FPSICOLOGOS</h4></div>
							<div class="text-info text-center mt-2"><h1>13</h1>
								<a href="{{ url('/pacientes') }}" class="btn btn-success">ver</a></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success mx-sm-1 p-3">
							<div class="card border-success text-success p-3 my-card"><span class="text-center fa fa-luggage-cart" aria-hidden="true"></span></div>
							<div class="text-success text-center mt-3"><h4>Consultas</h4></div>
							<div class="text-success text-center mt-2"><h1>9,332</h1>
								<a href="{{ url('/home') }}" class="btn btn-success">ver</a></div>
								<a href="{{ url('/home') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Inicio</a>
								
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-danger mx-sm-1 p-3">
							<div class="card border-danger text-danger p-3 my-card" ><span class="text-center fa fa-sticky-note" aria-hidden="true"></span></div>
							<div class="text-danger text-center mt-3"><h4>Apuntes</h4></div>
							<div class="text-danger text-center mt-2"><h1>12,762</h1>
								<button type="button" class="btn btn-danger">Ver</button></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-warning mx-sm-1 p-3">
							<div class="card border-warning text-warning p-3 my-card" ><span class="text-center fa fa-users" aria-hidden="true"></span></div>
							<div class="text-warning text-center mt-3"><h4>Pacientes totales</h4></div>
							<div class="text-warning text-center mt-2"><h1>{{ Auth::user()->count() }}</h1>
								<button type="button" class="btn btn-warning">Ver</button></div>
						
						</div>
					</div>
				 </div>				
			</div>
		</div>
	</div>

	<img src="data:image/jpeg;base64,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">
</div>
</div>
@endsection