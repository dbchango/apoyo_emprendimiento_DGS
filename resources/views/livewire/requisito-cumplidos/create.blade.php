<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Requisito Cumplido</h5>
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
                <label for="user_id"></label>
                <select wire:model="user_id" type="text" class="form-control" id="user_id" placeholder="Usuario">@error('user_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    @foreach ($user as $user)
                            <option value="{{ $user->id }}">{{ $user->nombre }}</option>
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