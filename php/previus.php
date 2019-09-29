<?php
session_start();
unset($_SESSION['edad']);
unset($_SESSION['genero']);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>PsicApp-Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="icon" href="../img/icono_page.png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8a020a1c5f.js" crossorigin="anonymous"></script>
  </head>
  <body id="preload">
    <?php require 'modal.php'; ?>
    <div class="container-fluid">
      <div class="text-center" style="font-size: 60px;">
        <img src="../img/brain.png" class="img-fluid" alt="PsicApp" style="padding-top: 20%;"><br>
        Psic<span style="color:#333;"><em style="color:azure;">App</em></span><br>
        <button type="button" class="btn btn-outline-dark" name="button" data-toggle="modal" data-target="#modal">Iniciar</button>
      </div>
    </div>
  </body>
</html>
