@section('title', __('Pacientes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Admministrador de pacientes </h4>
						</div>
						<div wire:poll.60s>
							<h4>Psicologia</h4>
							<h5>Inacap -2022</h5>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar pacientes">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar Pacientes
						</div>
					</div>
				</div>

				
				
				<div class="card-body">
						@include('livewire.pacientes.create')
						@include('livewire.pacientes.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Apellidopaterno</th>
								<th>Apellidomaterno</th>
								<th>Correo</th>
								<th>Notas</th>
								<th>Prioridad de atención</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($pacientes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->Nombre }}</td>
								<td>{{ $row->ApellidoPaterno }}</td>
								<td>{{ $row->ApellidoMaterno }}</td>
								<td>{{ $row->Correo }}</td>
								<td>{{ $row->Foto }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"></i> Alta </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Paciente id {{$row->id}}? \nDeleted Pacientes cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"> Moderada </a>
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa-solid fa-face-frown"></i> Baja </a>   
									</div>
								</div>
								
								</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
										</button>
										<div class="dropdown-menu dropdown-menu-right">
										<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
										<a class="dropdown-item" onclick="confirm('Confirm Delete Paciente id {{$row->id}}? \nDeleted Pacientes cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
										</div>
									</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $pacientes->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
