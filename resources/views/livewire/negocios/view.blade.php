@section('title', __('Negocios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>Negocios </h4>

						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">

						<i class="fa fa-plus"></i>  Agregar Negocios

						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.negocios.create')
						@include('livewire.negocios.update')
                        @include('livewire.negocios.manager')
                        @include('livewire.negocios.requisitos')

						<h2 style="padding: 25px;" align ="center";> Negocios Registrados </h2>

				 <div class="container">
					<div style="padding= 10px;" class="row">
						@foreach($negocios as $row)
						<div style="padding-bottom: 25px;" class="col-4">
							<div  class="card" style="width: 18rem;">
								<img style="width: 18rem;" class="card-img-top" src="{{ $row->logo }}" alt="Card image cap">
							<div class="card-body">
							<h1>{{ $row->nombre }}</h1>
							<h2>{{ $row->ubicacion }}</h2>
							<p class="card-text">{{ $row->detalles }}</p>
										<div class="btn-group">
												<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Actions
												</button>
                                                <button type="button" class="btn btn-warning"><a data-toggle="modal" data-target="#managerModal" wire:click="idNegocio({{$row->id}})">Gestionar</a></button>
                                                <button type="button" class="btn btn-success"><a data-toggle="modal" data-target="#requisitosModal"  wire:click="idNegocio({{$row->id}})">Cumplimiento</a></button>
												<div class="dropdown-menu dropdown-menu-right">
                                                <a data-toggle="modal" data-target="#managerModal" class="dropdown-item" wire:click="idNegocio({{$row->id}})"><i class="fa fa-edit"></i> Gestionar </a>
												<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
												<a class="dropdown-item" onclick="confirm('Confirm Delete Negocio id {{$row->id}}? \nDeleted Negocios cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
												</div>
										</div>
							</div>
						</div>
						</div>
						@endforeach
					</div>
				</div>

				<!-- <div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre</th>
								<th>Ubicacion</th>
								<th>Detalles</th>
								<th>Logo</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($negocios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->ubicacion }}</td>
								<td>{{ $row->detalles }}</td>
								<td><img width="100px" src='{{ $row->logo }}'></td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Negocio id {{$row->id}}? \nDeleted Negocios cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $negocios->links() }}
					</div>
				</div>   -->
			</div>
		</div>
	</div>
</div>
