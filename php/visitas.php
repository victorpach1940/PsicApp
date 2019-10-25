<?php
require 'conn.php';
if ($_POST['Listo']==1) {
  $edad = $_POST['edad'];
  $genero = $_POST['genero'];
  $sql="INSERT into VISITANTES values ('','$genero','$edad','');";
  $result=mysqli_query($conn,$sql);
  session_start();
  $_SESSION['edad']=$edad;
  $_SESSION['genero']=$genero;
  header("location: opciones.php");
}
else{
  header("location: visitas.php");
}
?>
