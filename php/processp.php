<?php
 require 'conn.php';

 session_start();

 $idee = '';
 $nam = '';
 $appp = '';
 $apmm = '';
 $apmm2 = '';
 $apmm3 = '';
 $apmm4 = '';
 $depre = '';

 $update = false;
 $i=0;

 if (isset($_POST['save'])){
   $ide = $_POST['ide'];
   $name = $_POST['nombre'];
   $app = $_POST['obv'];//costo
   $apm = $_POST['fec'];//inventario
   $apm2 = $_POST['fec2'];//cantidad suministrada
   $apm4 = $_POST['fec4'];//cada cuantas horas
   $apm3 = $_POST['fec3'];//para el apdecimiento
   $sql1 = "INSERT INTO MEDICAMENTOS VALUES ('','$name','$app','$apm', '$apm2', '$apm4','$apm3');";
   if($conn->query($sql1)===TRUE){
     $_SESSION['message'] = "Medicamento agregado!";
     $_SESSION['msg_type'] = "success";
   }
   else{
     $_SESSION['message'] = "Error al agregar!";
     $_SESSION['msg_type'] = "danger";
   }

   header("location: productos.php");
 }
 if (isset($_GET['delete'])){
   $id = $_GET['delete'];
   $conn->query("DELETE FROM MEDICAMENTOS WHERE idemed='$id';");
   $_SESSION['message'] = "Medicamento borrado exitosamente!";
   $_SESSION['msg_type'] = "success";

   header("location: productos.php");
 }

 if (isset($_GET['edit'])){
   $id2 = $_GET['edit'];
   $update = true;
   $result = $conn->query("SELECT * FROM MEDICAMENTOS WHERE idemed='$id2';");
   if(mysqli_num_rows($result) > 0){
     $row = $result->fetch_array();
     $idee = $row['idemed'];
     $nam = $row['nommed'];
     $appp = $row['cosmed'];
     $apmm = $row['invmed'];
     $apmm2 = $row['cansub'];
     $apmm4 = $row['cadhor'];
     $apmm3 = $row['medipad'];
   }
 }

 if(isset($_POST['update'])){
   $i = $_POST['i'];
   $nom = $_POST['nombre'];
   $apat = $_POST['obv'];//costo
   $amat = $_POST['fec'];//inventario
   $amat2 = $_POST['fec2'];//cantidad suministrada
   $amat3 = $_POST['fec4'];//horas
   $amat4 = $_POST['fec3'];//Padecimiento
   $conn->query("UPDATE MEDICAMENTOS SET nommed='$nom', cosmed='$apat', invmed='$amat', cansub='$amat2', cadhor='$amat3', medipad='$amat4' WHERE idemed='$i';");
   $_SESSION['message'] = "Medicamento modificado exitosamente!";
   $_SESSION['msg_type'] = "success";
   header("location: productos.php");
 }
 ?>
