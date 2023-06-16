<div class="modal" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Alterar estado</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('events.update',$event->id)}}">
            @method('PATCH')
            @csrf
          
            <div class="modal-body">
            
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Estado:</label>
                <select type="number" class="form-control" id="status_id" name="status_id" placeholder="Quantidade requisitada" required>
                  <option value="2" @if ($event->status_id == 2) selected @endif>Aprovado</option>
                  <option value="3" @if ($event->status_id == 3) selected @endif>Pendente</option>
                  <option value="1" @if ($event->status_id == 1) selected @endif>Cancelado</option>
                </select>
              </div>

            
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-info">Submeter</button>
            </div>
        </form>
        </div>
      </div>
    </div>
 