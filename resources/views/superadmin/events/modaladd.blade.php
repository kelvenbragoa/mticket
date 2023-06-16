<div class="modal" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Adicionar protocolo</h5>
          
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('protocols.store')}}">
            @csrf
          
            <div class="modal-body">
            
              <div class="form-group">
                <label for="name" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
              </div>

              <div class="form-group">
                <label for="mobile" class="col-form-label">Telefone:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Nome" required>
              </div>

              <div class="form-group">
                <label for="mobile" class="col-form-label">Bilhete de Identificação:</label>
                <input type="text" class="form-control" id="bi" name="bi" placeholder="Nome" required>
                <input type="hidden" class="form-control" id="event_id" name="event_id" value="{{$event->id}}" required>
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
  