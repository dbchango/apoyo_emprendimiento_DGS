<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Requisito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="costo"></label>
                <input wire:model="costo" type="text" class="form-control" id="costo" placeholder="Costo">@error('costo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="contenido"></label>
                <input wire:model="contenido" type="text" class="form-control" id="contenido" placeholder="Contenido">@error('contenido') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="detalles"></label>
                <input wire:model="detalles" type="text" class="form-control" id="detalles" placeholder="Detalles">@error('detalles') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="organizaciones_regulatorias_id"></label>
                <select wire:model="organizaciones_regulatorias_id" class="form-control" id="organizaciones_regulatorias_id" placeholder="Organizaciones Regulatorias">@error('organizaciones_regulatorias_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    <option value="">Selecione la organización regulatoria</option>
                    @foreach ($organizacionesRegulatoria as $organizacionesRegulatorias)
                        <option value="{{$organizacionesRegulatorias ->id}}">{{$organizacionesRegulatorias->nombre}}</option>
                    @endforeach
                </select>
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>