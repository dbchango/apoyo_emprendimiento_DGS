<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Pre Requisito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
         

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
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>