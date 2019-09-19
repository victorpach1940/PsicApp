<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Medicamentos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/mediapp.png">
  </head>
  <body>
    <?php require "menu_superior.php"; require "menu_inferior.php"; require_once 'conn.php'; require_once 'processp.php'; ?>
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'];
        unset ($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <div class="container">
      <?php
      $us=$_SESSION['usuario'];
        $result= mysqli_query($conn,"SELECT * FROM MEDICAMENTOS;");
      ?>
      <div class="row justify-content-center">
        <h1>Medicamentos</h1>
        <div class="table-responsive">
          <table class="table table-striped">
          <thead>
            <tr>
              <th>Ide</th>
              <th>Nombre</th>
              <th>Costo</th>
              <th>Inventario</th>
              <th>Cantidad suministrada</th>
              <th>Cada</th>
              <th>Para el Padecimiento</th>
              <th colspan="2">Accion</th>
            </tr>
          </thead>
          <?php
            while ($row = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <td><?php echo $row['idemed']; ?></td>
                <td><?php echo $row['nommed']; ?></td>
                <td><?php echo $row['cosmed']; ?>$</td>
                <td><?php echo $row['invmed']; ?></td>
                <td><?php echo $row['cansub']; ?></td>
                <td><?php echo $row['cadhor']; ?> hrs</td>
                <td><?php echo $row['medipad']; ?></td>
                <td>
                  <a href="productos.php?edit=<?php echo $row['idemed']; ?>"
                    class="btn btn-info">Editar</a>
                  <a href="processp.php?delete=<?php echo $row['idemed']; ?>"
                    class="btn btn-danger">Borrar</a>
                </td>
              </tr>
            <?php
            endwhile;
            ?>
        </table>
      </div>
    </div>
      <div class="row justify-content-center">
        <form class="" action="processp.php" method="post">
          <input type="hidden" name="i" value="<?php echo $idee; ?>">
          <div class="form-group">
            <label>Nombre del medicamento</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $nam; ?>" placeholder="Ingresa el medicamento">
          </div>
          <div class="form-group">
            <label>Costo</label>
            <input type="text" name="obv" class="form-control" value="<?php echo $appp; ?>" placeholder="Ingresa el costo">
          </div>
          <div class="form-group">
              <label>Inventario</label>
              <input type="text" name="fec" class="form-control" value="<?php echo $apmm; ?>" placeholder="Inventario">
          </div>
          <div class="form-group">
              <label>Cantidad suministrada</label>
              <input type="text" name="fec2" class="form-control" value="<?php echo $apmm2; ?>" placeholder="Cantidad suministrada">
          </div>
          <div class="form-group">
              <label>Cada cuantas horas</label>
              <input type="number" name="fec4" class="form-control" value="<?php echo $apmm4; ?>" placeholder="horas">
          </div>
          <div class="form-group">
            <label>Padecimiento</label>
            <select class="custom-select" name="fec3">
              <?php $actact=''; $actividad= mysqli_query($conn, "SELECT nompad FROM PADECIMIENTOS WHERE padlog='$us';");
              if (count($actividad)>0){
                while ($actact=mysqli_fetch_array($actividad)) {
                  print ("<option value='".$actact[0]."'>".$actact[0]."</option>");
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <?php if ($update == true): ?>
              <button type="submit" class="btn btn-info" name="update">Modificar</button>
            <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">Guardar</button>
          <?php endif; ?>
          </div>
          </form>
      </div>
    </div>
    <br><br><br>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
