<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hiden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="visitas.php" method="post">
        <div class="modal-header">
          Antes de empezar
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="edad">¿Cual es tu edad?</label>
            <input type="text" class="form-control" name="edad" required="" pattern="[0-9]{2}" maxlength="2" title="Edad desde 10 años" placeholder="10-90">
          </div>
          <div class="form-group">
            <label for="genero">¿Cual es tu genero?</label>
            <input type="text" class="form-control" name="genero" required="" pattern="(F|M)" maxlength="1" title="F=femenino, M=masculino" placeholder="F o M">
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info" name="Listo" value="1">
            Listo</button>
        </div>
      </form>
    </div>
  </div>
</div>
