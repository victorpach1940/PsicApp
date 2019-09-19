<?php
 require 'conn.php';

 session_start();

 $idee = '';
 $nam = '';
 $appp = '';
 $apmm = '';
 $apmm2 = '';

 $update = false;
 $i=0;

 if (isset($_POST['save'])){
   $name = $_POST['nombre'];
   $app = $_POST['obv'];
   $apm = $_POST['fec'];
   $apm2 = $_POST['fec2'];
   $usuariom= $_POST['fec3'];

   $sql1 = "INSERT INTO PADECIMIENTOS VALUES('$name','$app','$apm','$apm2','$usuariom');";
   if($conn->query($sql1)===TRUE){
     $_SESSION['message'] = "Padecimiento agregado!";
     $_SESSION['msg_type'] = "success";
   }
   else{
     $_SESSION['message'] = "Error al agregar!";
     $_SESSION['msg_type'] = "danger";
   }

   header("location: casos.php");
 }
 if (isset($_GET['delete'])){
   $id = $_GET['delete'];
   $conn->query("DELETE FROM PADECIMIENTOS WHERE nompad='$name';");
   $_SESSION['message'] = "Padecimiento borrado exitosamente!";
   $_SESSION['msg_type'] = "success";

   header("location: casos.php");
 }

 if (isset($_GET['edit'])){
   $id2 = $_GET['edit'];
   $update = true;
   $result = $conn->query("SELECT * FROM PADECIMIENTOS WHERE nompad='$id2';");
   if(mysqli_num_rows($result) > 0){
     $row = $result->fetch_array();
     $idee = $row['nompad'];
     $nam = $row['sintoma1'];
     $appp = $row['sintoma2'];
     $apmm = $row['sintoma3'];
     $apmm2 = $row['padlog'];
   }
 }

 if(isset($_POST['update'])){
   $i = $_POST['i'];
   $nom = $_POST['nombre'];
   $apat = $_POST['obv'];
   $amat = $_POST['fec'];
   $amat2 = $_POST['fec2'];

   $conn->query("UPDATE PADECIMIENTOS SET sintoma1='$apat', sintoma2='$amat', sintoma3='$amat2' WHERE nompad='$i';");
   $_SESSION['message'] = "Padecimiento modificado exitosamente!";
   $_SESSION['msg_type'] = "success";
   header("location: casos.php");
 }
 ?>
