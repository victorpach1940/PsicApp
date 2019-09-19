<!DOCTYPE html>
<html lang="es" style="height: 100%; width: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Horarios</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/mediapp.png">
  </head>
  <body style="height: 100%;">
    <?php require "menu_superior.php"; require "menu_inferior.php"; require_once 'conn.php'; require_once 'processa.php'; ?>
    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php echo $_SESSION['message'];
        unset ($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <div class="container">
      <?php
      $usus=$_SESSION['usuario'];
        $result= mysqli_query($conn,"SELECT * FROM HORARIOS WHERE horusu='$usus';");
      ?>
      <div class="row justify-content-center">
        <h1>Horarios</h1>
        <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Ide</th>
              <th>Hora 1</th>
              <th>Hora 2</th>
              <th>Hora 3</th>
              <th>Hora 4</th>
              <th>Medicamento</th>
              <th colspan="2">Accion</th>
            </tr>
          </thead>
          <?php
            while ($row = mysqli_fetch_assoc($result)):
              $med=$row['hormedi'];
              $result1= mysqli_query($conn,"SELECT nommed FROM MEDICAMENTOS WHERE idemed='$med';");
              $row1= mysqli_fetch_assoc($result1);
              ?>
              <tr>
                <td><?php echo $row['idehor']; ?></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar1']; ?></a></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar2']; ?></a></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar3']; ?></a></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar4']; ?></a></td>
                <td><?php echo $row1['nommed']; ?></td>
                <td>
                  <a href="actividades.php?edit=<?php echo $row['idehor']; ?>"
                    class="btn btn-info">Editar</a>
                  <a href="processa.php?delete=<?php echo $row['idehor']; ?>"
                    class="btn btn-danger">Borrar</a>
                </td>
              </tr>
            <?php endwhile; ?>
        </table>
      </div>
    </div>
      <div class="row justify-content-center">
        <form class="" action="processa.php" method="post">
          <input type="hidden" name="i" value="<?php echo $idee; ?>">
          <input type="hidden" name="iuse" value="<?php echo $usus; ?>">
          <div class="form-group">
            <label>Hora 1</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $nam; ?>" placeholder="Primera toma" pattern="(1|2|3|4|5|6|7|8|9|10|11|12)(am|pm)" minlenght="3" maxlength="4" title="El formato permitido es: 1am, 12am, 1pm, 12pm, etc.">
          </div>
          <div class="form-group">
            <label>Hora 2</label>
            <input type="text" name="obv" class="form-control" value="<?php echo $appp; ?>" placeholder="Segunda toma" pattern="(1|2|3|4|5|6|7|8|9|10|11|12)(am|pm)" minlenght="3" maxlength="4" title="El formato permitido es: 1am, 12am, 1pm, 12pm, etc.">
          </div>
          <div class="form-group">
            <label>Hora 3</label>
            <input type="text" name="fec" class="form-control" value="<?php echo $apmm; ?>" placeholder="Tercera toma" pattern="(1|2|3|4|5|6|7|8|9|10|11|12)(am|pm)" minlenght="3" maxlength="4" title="El formato permitido es: 1am, 12am, 1pm, 12pm, etc.">
          </div>
          <div class="form-group">
            <label>Hora 4</label>
            <input type="text" name="fec2" class="form-control" value="<?php echo $apmm2; ?>" placeholder="Cuarta toma" pattern="(1|2|3|4|5|6|7|8|9|10|11|12)(am|pm)" minlenght="3" maxlength="4" title="El formato permitido es: 1am, 12am, 1pm, 12pm, etc.">
          </div>
          <div class="form-group">
            <label>Medicamento</label>
            <select class="custom-select" name="hrs">
              <?php $actact=''; $actividad= mysqli_query($conn, "SELECT idemed, nommed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$usus' AND medipad=nompad;");
              if (count($actividad)>0){
                while ($actact=mysqli_fetch_array($actividad)) {
                  print ("<option value='".$actact[0]."'>".$actact[1]."</option>");
                }
              }
              ?>
            </select>
            <!--<input type="text" name="hrs" class="form-control" value="<?php echo $tele; ?>" placeholder="Horas">-->
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
