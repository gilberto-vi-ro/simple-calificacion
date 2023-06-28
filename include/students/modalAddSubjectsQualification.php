
<!-- Modal -->
<div class="modal fade" id="modalAddAsignaturaCalificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Asignatura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAddAsignaturaCalificacion" class="asignaturaCalificacion">
          <input type="text" hidden name="id_calificacion" value="null">
          <input type="text" hidden name="id_alumno" value="null">
          <div class="form-group">
            <label for="nombre">Asignatura</label>
            <select name="id_asignatura" class="form-control" required="">
              <option hidden="" value="">Seleciona una Asignatura</option>
            </select>
          </div>
          <div class="form-group">
            <label for="calificacion">Calficacion</label>
            <input type="text" class="form-control" name="calificacion" placeholder="Ingrese la calficacion">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="addAsignaturaCalificacion()">Agregar</button>
      </div>
    </div>
  </div>
</div>