<!DOCTYPE html>
<html lang="es" style="height: 100%; width: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Medicos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/mediapp.png">
  </head>
  <body style="height: 100%;">
    <?php require "menu_superior.php"; require "menu_inferior.php"; require_once 'conn.php'; require_once 'processr.php'; ?>
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'];
        unset ($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <div class="container">
      <?php
        $result= mysqli_query($conn,"SELECT * FROM MEDICOS;");
      ?>
      <div class="row justify-content-center">
        <h1>Medicos</h1>
        <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Ide</th>
              <th>Nombre</th>
              <th>Tipo de medico</th>
              <th>Telefono</th>
              <th>Direccion</th>
              <th colspan="2">Accion</th>
            </tr>
          </thead>
          <?php
            while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?php echo $row['idemed']; ?></td>
                <td><?php echo $row['nommed']; ?></td>
                <td><?php echo $row['tipmed']; ?></td>
                <td><?php echo $row['telmed']; ?></td>
                <td><?php echo $row['direc']; ?></td>
                <td>
                  <a href="responsables.php?edit=<?php echo $row['idemed']; ?>"
                    class="btn btn-info">Editar</a>
                  <a href="processr.php?delete=<?php echo $row['idemed']; ?>"
                    class="btn btn-danger">Borrar</a>
                </td>
              </tr>
            <?php endwhile; ?>
        </table>
      </div>
      </div>
      <div class="row justify-content-center">
        <form class="" action="processr.php" method="post">
          <input type="hidden" name="i" value="<?php echo $idee; ?>">
          <div class="form-group">
            <label>Identificador</label>
            <input type="text" name="ide" class="form-control" value="<?php echo $idee; ?>" placeholder="Ingresa el ide">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $nam; ?>" placeholder="Ingresa el nombre">
          </div>
          <div class="form-group">
            <label>Tipo de medico</label>
            <input type="text" name="app" class="form-control" value="<?php echo $appp; ?>" placeholder="Tipo de medico">
          </div>
          <div class="form-group">
            <label>Telefono</label>
            <input type="text" name="tel" class="form-control" value="<?php echo $tele; ?>" placeholder="Ingresa el Telefono">
          </div>
          <div class="form-group">
            <label>Direccion de consultorio</label>
            <input type="text" name="carg" class="form-control" value="<?php echo $car; ?>" placeholder="Consultorio">
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
<br><br>
<br>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
