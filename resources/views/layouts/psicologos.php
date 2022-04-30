@extends('layouts.app')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
            <div class="card-body">
              <h5>  
            @guest
				
				{{ __('PSICOLOGOS') }} {{ config('app.name', 'Laravel') }} !!! </br>
				
                Contactese con el administrador para que se pueda ingresar a su dashboard.
                
			@else
					Hola {{ Auth::user()->name }}, Bienvenido a nuestro sistema creado con {{ config('app.name', 'Laravel') }}.
            @endif	
				</h5>
            </div>
        </div>
    </div>
</div>
</div>
@endsection