<!DOCTYPE html>
<html lang="es" style="height: 100%; width: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/mediapp.png">
  </head>
  <body style="height: 100%;">
    <?php require "menu_superior.php"; require "menu_inferior.php"; require_once 'conn.php'; require_once 'process.php'; ?>
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'];
        unset ($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <div class="container">
      <?php
      $USE=$_SESSION['usuario'];
      $result= mysqli_query($conn,"SELECT * FROM LOGIN WHERE user='$USE';");
      ?>
      <div class="row justify-content-center">
        <h1>Mi Perfil</h1>
        <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Paterno</th>
              <th>Materno</th>
              <th>Telefono</th>
              <th>Alergias</th>
              <th>Enfermedad Cronica</th>
              <th>Tipo de sangre</th>
              <th>Edad</th>
              <th>Altura</th>
              <th>Peso</th>
              <th>Medico</th>
              <th colspan="2">Accion</th>
            </tr>
          </thead>
          <?php
            $result1= mysqli_query($conn,"SELECT * FROM LOGIN WHERE user='$USE';");
            $row2 = mysqli_fetch_assoc($result1);
            $idmed = $row2['logmedi'];
            $result2= mysqli_query($conn,"SELECT * FROM MEDICOS WHERE idemed='$idmed';");
            $row3 = mysqli_fetch_assoc($result2);
            while ($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?php echo $row['user']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['app']; ?></td>
                <td><?php echo $row['apm']; ?></td>
                <td><?php echo $row['tel']; ?></td>
                <td><?php echo $row['alergias']; ?></td>
                <td><?php echo $row['encronica']; ?></td>
                <td><?php echo $row['tipsangre']; ?></td>
                <td><?php echo $row['edad']; ?></td>
                <td><?php echo $row['altura']; ?></td>
                <td><?php echo $row['peso']; ?></td>
                <td><?php echo $row3['nommed']; ?></td>
                <td>
                  <a href="participantes.php?edit=<?php echo $row['user']; ?>"
                    class="btn btn-info">Editar</a>
                  <a href="process.php?delete=<?php echo $row['user']; ?>"
                    class="btn btn-danger">Borrar</a>
                </td>
              </tr>
            <?php endwhile; ?>
        </table>
      </div>
      </div>
      <div class="row justify-content-center">
        <form class="" action="process.php" method="post">
          <input type="hidden" name="i" value="<?php echo $idee; ?>">
          <div class="form-group">
            <label>User</label>
            <input type="text" name="ide" class="form-control" value="<?php echo $idee; ?>" placeholder="Ingresa el mail">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $nam; ?>" placeholder="Ingresa el nombre">
          </div>
          <div class="form-group">
            <label>Apellido paterno</label>
            <input type="text" name="app" class="form-control" value="<?php echo $appp; ?>" placeholder="Apellido paterno">
          </div>
          <div class="form-group">
            <label>Apellido materno</label>
            <input type="text" name="apm" class="form-control" value="<?php echo $apmm; ?>" placeholder="Apellido materno">
          </div>
          <div class="form-group">
            <label>Telefono</label>
            <input type="text" name="tel" class="form-control" value="<?php echo $tele; ?>" placeholder="Ingresa el Telefono">
          </div>
          <div class="form-group">
            <label>Alergias</label>
            <input type="text" name="mail" class="form-control" value="<?php echo $mai; ?>" placeholder="Ingresa alergias">
          </div>
          <div class="form-group">
            <label>Enfermedad cronica</label>
            <input type="text" name="carg" class="form-control" value="<?php echo $car; ?>" placeholder="Enfermedad cronica">
          </div>
          <div class="form-group">
            <label>Tipo de sangre</label>
            <input type="text" name="fun" class="form-control" value="<?php echo $fun; ?>" placeholder="Tipo de sangre">
          </div>
          <div class="form-group">
            <label>Edad</label>
            <input type="number" name="fun1" class="form-control" value="<?php echo $fun1; ?>" placeholder="Edad">
          </div>
          <div class="form-group">
            <label>Altura</label>
            <input type="text" name="fun2" class="form-control" value="<?php echo $fun2; ?>" placeholder="Altura">
          </div>
          <div class="form-group">
            <label>Peso</label>
            <input type="text" name="fun3" class="form-control" value="<?php echo $fun3; ?>" placeholder="Peso">
          </div>
          <div class="form-group">
            <label>Medico</label>
            <select class="custom-select" name="fun4">
              <?php $actact=''; $actividad= mysqli_query($conn, "SELECT idemed, nommed FROM MEDICOS;");
              if (count($actividad)>0){
                while ($actact=mysqli_fetch_array($actividad)) {
                  print ("<option value='".$actact[0]."'>".$actact[1]."</option>");
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
    <br><br><br><br>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
