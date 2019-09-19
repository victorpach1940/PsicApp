<!DOCTYPE html>
<html lang="es" style="height: 100%; width: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Padecimientos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/mediapp.png">
  </head>
  <body style="height: 100%;">
    <?php require "menu_superior.php"; require "menu_inferior.php"; require_once 'conn.php'; require_once 'processc.php'; ?>
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'];
        unset ($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <div class="container">
      <?php
      $usu=$_SESSION['usuario'];
        $result= mysqli_query($conn,"SELECT * FROM PADECIMIENTOS WHERE padlog='$usu';");
      ?>
      <div class="row justify-content-center">
        <h1>Padecimientos</h1>
        <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Padecimiento</th>
              <th>Sintoma1</th>
              <th>Sintoma2</th>
              <th>Sintoma3</th>
              <th>Paciente</th>
              <th colspan="2">Accion</th>
            </tr>
          </thead>
          <?php
            $result1= mysqli_query($conn,"SELECT * FROM LOGIN WHERE user='$usu';");
            $row2=mysqli_fetch_assoc($result1);
            while ($row = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <td><?php echo $row['nompad']; ?></td>
                <td><?php echo $row['sintoma1']; ?></td>
                <td><?php echo $row['sintoma2']; ?></td>
                <td><?php echo $row['sintoma3']; ?></td>
                <td><?php echo $row2['nombre'];?> <?php echo $row2['app'];?> <?php echo $row2['apm'];?></td>
                <td>
                  <a href="casos.php?edit=<?php echo $row['nompad']; ?>"
                    class="btn btn-info">Editar</a>
                  <a href="processc.php?delete=<?php echo $row['nompad']; ?>"
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
        <form class="" action="processc.php" method="post">
          <input type="hidden" name="i" value="<?php echo $idee; ?>">
          <input type="hidden" name="fec3" value="<?php echo $usu; ?>">
          <div class="form-group">
            <label>Padecimiento</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $idee; ?>" placeholder="Nombre de enfermedad">
          </div>
          <div class="form-group">
            <label>Sintoma 1</label>
            <input type="text" name="obv" class="form-control" value="<?php echo $nam; ?>" placeholder="Sintoma 1">
          </div>
          <div class="form-group">
            <label>Sintoma 2</label>
            <input type="text" name="fec" class="form-control" value="<?php echo $appp; ?>" placeholder="Sintoma 2">
          </div>
          <div class="form-group">
            <label>Sintoma 3</label>
            <input type="tex" name="fec2" class="form-control" value="<?php echo $apmm; ?>" placeholder="Sintoma 3">
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
<br>
<br><br>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
