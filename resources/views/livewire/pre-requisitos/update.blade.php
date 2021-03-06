<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Prerrequisito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                  
                    <div class="form-group">
                        <label for="requisito_id"></label>
                        <select wire:model="requisito_id" class="form-control" id="requisito_id" placeholder="Requisito">@error('requisito_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option>Selecciones el requisito</option>
                            @foreach ($requisitos as $requisito)
                                <option value="{{ $requisito->id }}">{{ $requisito->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pre_requisito_id"></label>
                        <select wire:model="pre_requisito_id" class="form-control" id="pre_requisito_id" placeholder="Requisito">@error('pre_requisito_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option>Selecciones el prerrequisito</option>
                            @foreach ($requisitos as $requisito)
                                <option value="{{ $requisito->id }}">{{ $requisito->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>