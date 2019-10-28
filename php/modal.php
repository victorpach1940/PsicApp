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
          <div class="form-group">
            <label for="estado">¿De donde eres?</label>
            <select class="form-control" name="estado">
              <option value="Aguascalientes">Aguascalientes</option>
              <option value="Baja california">Baja california</option>
              <option value="Baja california sur">Baja california sur</option>
              <option value="Campeche">Campeche</option>
              <option value="Chiapas">Chiapas</option>
              <option value="Chihuahua">Chihuahua</option>
              <option value="Ciudad de Mexico">Ciudad de México</option>
              <option value="Coahuila">Coahuila</option>
              <option value="Colima">Colima</option>
              <option value="Durango">Durango</option>
              <option value="Guanajuato">Guanajuato</option>
              <option value="Guerrero">Guerrero</option>
              <option value="Hidalgo">Hidalgo</option>
              <option value="Jalisco">Jalisco</option>
              <option value="Mexico">México</option>
              <option value="Michoacan">Michoacán</option>
              <option value="Morelos">Morelos</option>
              <option value="Nayarit">Nayarit</option>
              <option value="Nuevo Leon">Nuevo León</option>
              <option value="Oaxaca">Oaxaca</option>
              <option value="Puebla">Puebla</option>
              <option value="Queretaro">Querétaro</option>
              <option value="Quintana Roo">Quintana Roo</option>
              <option value="San Luis Potosi">San Luis Potosí</option>
              <option value="Sinaloa">Sinaloa</option>
              <option value="Sonora">Sonora</option>
              <option value="Tabasco">Tabasco</option>
              <option value="Tamaulipas">Tamaulipas</option>
              <option value="Tlaxcala">Tlaxcala</option>
              <option value="Veracruz">Veracruz</option>
              <option value="Yucatan">Yucatán</option>
              <option value="Zacatecas">Zacatecas</option>
            </select>
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
