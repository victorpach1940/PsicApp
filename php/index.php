<!DOCTYPE html>
<html lang="es" style="height: 100%; width: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>MediTec</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../img/mediapp.png">
    <script src="../js/push.min.js"></script>
  </head>
  <body style="height: 100%;">
      <?php require "menu_superior.php"; require "menu_inferior.php"; require "consultarhorario.php"; ?>
      <div id="home" style="background: url(../img/salud.jpg) no-repeat center center fixed; display: table; height: 90%; position: relative; width: 100%; background-size: cover;">
        <div class="landing-text" style="display: table-cell; text-align: center; vertical-align: middle;">
          <h1 style="font-size: 350%; font-weight: 700; color: black;">MediTec</h1>
          <h1 style="font-size: 500%; font-weight: 700; color: orange;">ITP</h1>
          <h3 style="color: black;">Altas, bajas y consultas</h3>
          <a href="../php/agenda.php" class="btn btn-default btn-lg" style="border-color: bold;">
            <button type="button" name="button">Ver Mi Agenda</button></a>
        </div>
      </div>
      <div class="padding" style="padding: 80px 0;">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <img src="../img/medicinass.png" width="350">
            </div>
            <div class="col-sm-6 text-center">
              <h2>Acerca del proyecto...</h2>
              <p class="lead">Base de datos que agrega, elimina y modifica, Medicamentos, Doctores y Horarios
              acerca de las medicinas a tomar por el paciente usuario de la app.</p>
            </div>
          </div>
        </div>
      </div>
      <footer class="page-footer container-fluid text center" style="width: 100%; background-color: #181A1E; padding: 5% 5% 5% 5%; color: white;">
        <div class="row">
          <div class="col-sm-4">
            <h5>Integrantes</h3><br>
            <h6>Alejandro Perez Fabian</h4>
            <h6>Jorge Mistran Leal</h4>
          </div>
          <div class="col-sm-4">
            <h5>Institucion</h3><br>
            <h6>Tecnologico de Puebla</h4>
            <h7>Ingenieria en TIC's</h4>
          </div>
          <div class="col-sm-4">
            <h5>Materia</h3><br>
            <h6>Taller de base de datos</h4>
            <h7>Prof. Jose Bernardo Parra Victorino</h4>
          </div>
        </div>
      </footer>
      <script>
      (function(){
        var actualizarHora = function(){
          var fecha = new Date(),
          horas = fecha.getHours(),
          ampm,
          minutos = fecha.getMinutes(),
          segundos = fecha.getSeconds();
          if(horas >=12){
            horas = horas-12;
            ampm='pm';
          }else{
            ampm='am';
          }
          if(horas==0){
            horas = 12;
          }
          var convert = horas.toString();
          var conc = convert+ampm;
          if(conc== <?php echo "'".$h1."'"; ?>){
            Push.create("Tomar medicamento",{
              body: "Tomar medicamento 1",
              icon: "../img/mediapp.png",
              timeout: 10000,
              onClick: function(){
                window.location="../php/tomarmedicamento.php?edit=<?php echo $medi; ?>";
                this.close();
              }
            })
          }else if (conc== <?php echo "'".$h2."'"; ?>) {
            Push.create("Tomar medicamento",{
              body: "Tomar medicamento 2",
              icon: "../img/mediapp.png",
              timeout: 10000,
              onClick: function(){
                window.location="../php/tomarmedicamento.php?edit=<?php echo $medi; ?>";
                this.close();
              }
            })
          }else if (conc== <?php echo "'".$h3."'"; ?>) {
            Push.create("Tomar medicamento",{
              body: "Tomar medicamento 3",
              icon: "../img/mediapp.png",
              timeout: 10000,
              onClick: function(){
                window.location="../php/tomarmedicamento.php?edit=<?php echo $medi; ?>";
                this.close();
              }
            })
          }
          else if(conc== <?php echo "'".$h4."'"; ?>){
            Push.create("Tomar medicamento",{
              body: "Tomar medicamento 4",
              icon: "../img/mediapp.png",
              timeout: 10000,
              onClick: function(){
                window.location="../php/tomarmedicamento.php?edit=<?php echo $medi; ?>";
                this.close();
              }
            })
          }
          else {
            <?php
              if($row9 = mysqli_fetch_assoc($result9)){
                $h1 = $row9['horar1'];
                $h2 = $row9['horar2'];
                $h3 = $row9['horar3'];
                $h4 = $row9['horar4'];
                $medi = $row9['hormedi'];
              }else {
                $result9= mysqli_query($conn,"SELECT hormedi, horar1, horar2, horar3, horar4 FROM HORARIOS WHERE horusu='$ususer';");
              }
            ?>
          }
        };
        actualizarHora();
        var intervalo = setInterval(actualizarHora, 1000);
      }())
      </script>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
