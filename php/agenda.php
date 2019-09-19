<!DOCTYPE html>
<html lang="es" style="height: 100%; width: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Agenda</title>
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
          <h1>Agenda</h1>
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
              <th>Inventario</th>
              <th>Cantidad suministrada</th>
              <th>Cada cuanto</th>
              <th>Costo</th>
              <th>Padecimiento</th>
              <th>Medico que receto</th>
            </tr>
          </thead>
          <?php
            while ($row = mysqli_fetch_assoc($result)):
              $med=$row['hormedi'];
              $result1= mysqli_query($conn,"SELECT nommed,cosmed,invmed,cansub,cadhor,medipad FROM MEDICAMENTOS WHERE idemed='$med';");
              $row1= mysqli_fetch_assoc($result1);
              $result2= mysqli_query($conn,"SELECT nommed FROM MEDICOS, LOGIN WHERE user='$usus' AND logmedi=idemed;");
              $row2= mysqli_fetch_assoc($result2);
              ?>
              <tr>
                <td><?php echo $row['idehor']; ?></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar1']; ?></a></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar2']; ?></a></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar3']; ?></a></td>
                <td><a href="diagrama.php?ver=<?php echo $row['idehor']; ?>"><?php echo $row['horar4']; ?></a></td>
                <td><?php echo $row1['nommed']; ?></td>
                <td><?php echo $row1['invmed']; ?></td>
                <td><?php echo $row1['cansub']; ?></td>
                <td><?php echo $row1['cadhor']; ?></td>
                <td><?php echo $row1['cosmed']; ?></td>
                <td><?php echo $row1['medipad']; ?></td>
                <td><?php echo $row2['nommed']; ?></td>
              </tr>
            <?php endwhile; ?>
        </table>
      </div>
    </div>
    </div>
<br><br><br>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
