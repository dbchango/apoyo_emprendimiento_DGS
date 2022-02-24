<!-- Modal -->
<div wire:ignore.self class="modal fade" id="managerModal" data-backdrop="static" tabindex="-1" requisitos="dialog" aria-labelledby="managerModalLabel" aria-hidden="true">
    <div class="modal-dialog" requisitos="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="managerModalLabel">Gestionar requisitos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <input type="hidden" wire:model="selectede_id">
					<h4>Requisitos:</h4>
                    <div class="form-group" >
                        <select wire:model="requisito_id"  class="form-control" type="text" name="requisito_id"  id="requisito_id">
                            <option>Seleccionar un requisito</option>
                            @if($this->selectede_id)
                                @foreach ($this->get_requisitos_incumplidos($this->selectede_id) as $requisito)
                                    <option value="{{$requisito->id}}">
                                        {{$requisito->nombre}}
                                    </option>
                                @endforeach    
                            @endif
                            
                        </select>@error('requisito_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="storeRequisito()" class="btn btn-primary close-modal" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
