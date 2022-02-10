@section('title', __('Requisitos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listado de requisitos </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						@if (session()->has('messageError'))
						<div wire:poll.4s class="btn btn-sm btn-danger" style="margin-top:0px; margin-bottom:0px;"> {{ session('messageError') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Requisitos">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Agregar Requisitos
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.requisitos.create')
						@include('livewire.requisitos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Costo</th>
								<th>Nombre</th>
								<th>Contenido</th>
								<th>Detalles</th>
								<th>Organización regulatoria</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($requisitos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->costo }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->contenido }}</td>
								<td>{{ $row->detalles }}</td>
								<td>{{ $row->organizacionesRegulatoria->nombre }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Requisito id {{$row->id}}? \nDeleted Requisitos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $requisitos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>