
<!-- Modal -->
<div class="modal fade" id="modalAddAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAddAlumno">
          <input type="text" hidden name="id_alumno" value="null">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre">
          </div>
          <div class="form-group">
            <label for="text">Apellido</label>
            <input type="text" class="form-control" name="apellido" placeholder="Ingrese el apellido">
          </div>
          <div class="form-group">
            <label for="text">Semestre</label>
            <input type="text" class="form-control" name="semestre" placeholder="Ingrese el semestre">
          </div>
          <div class="form-group">
            <label for="text">Grupo</label>
            <input type="text" class="form-control" name="grupo" placeholder="Ingrese el grupo">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="addAlumno()">Agregar</button>
      </div>
    </div>
  </div>
</div>