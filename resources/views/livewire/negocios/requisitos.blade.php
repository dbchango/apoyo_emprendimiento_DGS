<!-- Modal -->
<div wire:ignore.self class="modal fade" id="requisitosModal" data-backdrop="static" tabindex="-1" requisitos="dialog" aria-labelledby="managerModalLabel" aria-hidden="true">
    <div class="modal-dialog" requisitos="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="managerModalLabel">Requisitos Cumplidos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <input type="hidden" wire:model="selectede_id">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Requisito/{{$Numdatos = DB::table('requisito_cumplidos')->count()}}</th>
                            <th>Fecha de registro</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requisitosCumplidos as $requisitosCumplido)
                        <tr>
                            <td>{{$Nombre =DB::table('requisitos')->where('id', $requisitosCumplido->requisito_id)->value('nombre')}}</td>
                            <td>{{$requisitosCumplido->created_at}}</td>
                            <td><a type="button" class="btn btn-danger" onclick="confirm('Confirm Delete Negocio id {{$requisitosCumplido->id}}? \nDeleted Negocios cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroyRequisitoCumplido({{$requisitosCumplido->id}})"><i class="fa fa-trash"></i> Delete </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success close-btn" data-dismiss="modal">Hecho</button>
            </div>
        </div>
    </div>
</div>
