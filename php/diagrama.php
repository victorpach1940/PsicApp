<!DOCTYPE html>
<html lang="es" style="height: 100%; width: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Diagrama</title>
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
      $ususa = $_SESSION['usuario'];
      $salida='';
      $hr1='';
      $hr2='';
      $hr3='';
      ?>
      <div class="row justify-content-center">
        <h1>Diagrama de Gantt</h1>
        <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr style="text-align: center;">
              <th rowspan="2">Horas</th>
              <th colspan="5">Medicamento</th>
            </tr>
            <tr>
              <?php
              $result1= mysqli_query($conn,"SELECT idemed, nommed, cadhor FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
              while ($row1 = mysqli_fetch_assoc($result1)): ?>
              <th style="text-align: center;"><?php echo $row1['nommed']; ?> c/<?php echo $row1['cadhor']; ?></th>
            <?php endwhile; ?>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>05:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '5am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '5am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '5am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '5am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              <tr>
                <td>06:00am</td>
                <?php
                  $salida='';
                  $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                  while ($row4 = mysqli_fetch_assoc($result4)) {
                    $medimedi=$row4['idemed'];
                    $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                    $row5= mysqli_fetch_assoc($result5);
                    $hr1 = $row5['horar1'];
                    $hr2 = $row5['horar2'];
                    $hr3 = $row5['horar3'];
                    $hr4 = $row5['horar4'];
                    if($hr1 === '6am'){
                      $salida.="<td class='bg-info'>".$hr1." primera</td>";
                    }
                    elseif ($hr2 === '6am') {
                      $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                    }
                    elseif ($hr3 === '6am') {
                      $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                    }
                    elseif ($hr4 === '6am') {
                      $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                    }
                    else {
                      $salida.="<td></td>";
                    }
                  }
                  echo $salida;
                ?>
              </tr>
              <tr>
                <td>07:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '7am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '7am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '7am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '7am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>08:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '8am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '8am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '8am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '8am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>09:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '9am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '9am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '9am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '9am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>10:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '10am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '10am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '10am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '10am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>11:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '11am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '11am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '11am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '11am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>12:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '12pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '12pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '12pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '12pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>01:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '1pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '1pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '1pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '1pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>02:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '2pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '2pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '2pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '2pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>03:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '3pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '3pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '3pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '3pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>04:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '4pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '4pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '4pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '4pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>05:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '5pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '5pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '5pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '5pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>06:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '6pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '6pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '6pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '6pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>07:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '7pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '7pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '7pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '7pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>08:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '8pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '8pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '8pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '8pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>09:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '9pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '9pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '9pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '9pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>10:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '10pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '10pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '10pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '10pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>11:00pm</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '11pm'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '11pm') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '11pm') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '11pm') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>12:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '12am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '12am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '12am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '12am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>01:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '1am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '1am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '1am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '1am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>02:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '2am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '2am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '2am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '2am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>03:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '3am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '3am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '3am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '3am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
              </tr>
              <tr>
                <td>04:00am</td>
                <?php
                $salida='';
                $result4= mysqli_query($conn,"SELECT idemed FROM MEDICAMENTOS, PADECIMIENTOS WHERE padlog='$ususa' AND medipad=nompad;");
                while ($row4 = mysqli_fetch_assoc($result4)) {
                  $medimedi=$row4['idemed'];
                  $result5= mysqli_query($conn,"SELECT horar1,horar2,horar3,horar4 FROM HORARIOS WHERE hormedi='$medimedi';");
                  $row5= mysqli_fetch_assoc($result5);
                  $hr1 = $row5['horar1'];
                  $hr2 = $row5['horar2'];
                  $hr3 = $row5['horar3'];
                  $hr4 = $row5['horar4'];
                  if($hr1 === '4am'){
                    $salida.="<td class='bg-info'>".$hr1." primera</td>";
                  }
                  elseif ($hr2 === '4am') {
                    $salida.="<td class='bg-info'>".$hr2." segunda</td>";
                  }
                  elseif ($hr3 === '4am') {
                    $salida.="<td class='bg-info'>".$hr3." tercera</td>";
                  }
                  elseif ($hr4 === '4am') {
                    $salida.="<td class='bg-info'>".$hr4." cuarta</td>";
                  }
                  else {
                    $salida.="<td></td>";
                  }
                }
                echo $salida;
                ?>
            </tbody>
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
