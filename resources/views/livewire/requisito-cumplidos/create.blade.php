<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Requisito Cumplido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="requisito_id"></label>
                <select wire:model="requisito_id" type="text" class="form-control" id="requisito_id" placeholder="Requisito">@error('requisito_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    @foreach ($requisitos as $requisito)
                            <option value="{{ $requisito->id }}">{{ $requisito->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="negocio_id"></label>
                <select wire:model="negocio_id" type="text" class="form-control" id="negocio_id" placeholder="Requisito">@error('negocio_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    <option>Seleccione un negocio</option>
                    @foreach ($negocios as $negocio)
                            <option value="{{ $negocio->id }}">{{ $negocio->nombre }} / {{ $negocio->ubicacion }}</option>
                    @endforeach
                </select>
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>